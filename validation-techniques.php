<?php
session_start();
include('bdd.php');






     $techniques_attente = $bdd->query("SELECT id, nom, rang, description, axe1, axe2, id, id_membre, Etat, periode_reception FROM techniques WHERE Etat = '0' ORDER by periode_reception DESC LIMIT 1");

         //Affichage de chaque technique
        while ($donnees = $techniques_attente->fetch())
        {
            $_SESSION['id_tech'] = htmlspecialchars($donnees['id']);
            $_SESSION['nom_tech'] = htmlspecialchars($donnees['nom']);
            $_SESSION['axe1'] = htmlspecialchars($donnees['axe1']);
            $_SESSION['axe2'] = htmlspecialchars($donnees['axe2']);
            $_SESSION['rang'] = htmlspecialchars($donnees['rang']);
            $_SESSION['description'] = htmlspecialchars($donnees['description']);

            $id_membre = htmlspecialchars($donnees['id_membre']);
            $_SESSION['id_tech_valid'] = $id_membre;
            
            echo '<p><strong>' . htmlspecialchars($donnees['nom']) . '</strong> <br /> ' 
            . htmlspecialchars($donnees['axe1']) . '/' . htmlspecialchars($donnees['axe2']) . ' - <strong> Rang ' . htmlspecialchars($donnees['rang']) . '</strong><br />
            ' . htmlspecialchars($donnees['description']) . '</p> <br />';           
        }

        $techniques_attente->closeCursor(); ?>

        <form action="validation-techniques2.php" method="post">
            <label>Décision de l'équipe administrative</label>
            <select id="choix-admin" name="choix-admin">
                <option value="Oui" name="Valider" value="Valider">Valider</option>
                <option value="Non" name="Refuser" value="Refuser">Refuser</option>
                <option value="Attente" name="Attente" value="Attente">Mettre en attente</option>
            </select><br />
            <label>Motif de Refus</label>
            <input type="text" placeholder="Précisez ici le motif de refus..." name="motif-refus"><br />            
            <button type="submit" name="valid-tech-admin" value="Ok">Envoyer</button>
         </form><br />
        <a href="module.php">Retourner au Menu de Gestion</a>
        
        <?php





?>