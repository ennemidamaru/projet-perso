<?php

    session_start();
    include('bdd.php');

    if(isset($_SESSION['login'])){
    $username = $_SESSION['login'];

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <header>

            <div id="fp-infos-head">

                <div id="fp-infos-talents">
                <h2>Talents</h2>
                <?php


                ?>
                </div>

                <div id="fp-infos-avatar"></div>
            
            </div>

        </header>

        <section>

            <a href="technique_envoi.php"> Accéder à la création de technique</a><br />
            <a href="fiche_technique.php"> Accéder à la fiche technique</a><br />
            <a href="boutique.php"> Accéder à la boutique</a><br />
            <a href="relations.php"> Accéder aux relations du personnage</a>

            <div id="fp-techniques">

                <div id="techniques-attente">
                <h2>Inventaire</h2>
                <?php


                ?>
                </div>

            </div>
            
            <div id="fp-techniques">

                <div id="fp-infos-techniques">
                <h2>Techniques Validées</h2>
                <?php

                    $sth5 = $bdd->prepare("SELECT id FROM membres WHERE username = '$username'");
                    $sth5->execute();
                    $result = $sth5->fetchAll(PDO::FETCH_ASSOC);
                    $id_membre = implode($result[0]);

                    // Récupération des techniques du personnage
                    $techniques = $bdd->query("SELECT nom, rang, description, axe1, axe2, id FROM techniques WHERE id_membre = '$id_membre' AND Etat='2'");

                    // Affichage de chaque technique
                    while ($donnees = $techniques->fetch())
                    {
                        
                        echo '<p><strong>' . htmlspecialchars($donnees['nom']) . '</strong> <br /> ' 
                        . htmlspecialchars($donnees['axe1']) . '/' . htmlspecialchars($donnees['axe2']) . ' - <strong> Rang ' . htmlspecialchars($donnees['rang']) . '</strong><br />
                        ' . htmlspecialchars($donnees['description']) . '</p> <br />';
                    }

                    $techniques->closeCursor();

                ?>
                <h2>Techniques En Attente</h2>
                <?php

                    $sth5 = $bdd->prepare("SELECT id FROM membres WHERE username = '$username'");
                    $sth5->execute();
                    $result = $sth5->fetchAll(PDO::FETCH_ASSOC);
                    $id_membre = implode($result[0]);

                    // Récupération des techniques du personnage
                    $techniques = $bdd->query("SELECT nom, rang, description, axe1, axe2, id FROM techniques WHERE id_membre = '$id_membre' AND Etat='0'");

                    // Affichage de chaque technique
                    while ($donnees = $techniques->fetch())
                    {
                        
                        echo '<p><strong>' . htmlspecialchars($donnees['nom']) . '</strong> <br /> ' 
                        . htmlspecialchars($donnees['axe1']) . '/' . htmlspecialchars($donnees['axe2']) . ' - <strong> Rang ' . htmlspecialchars($donnees['rang']) . '</strong><br />
                        ' . htmlspecialchars($donnees['description']) . '</p> <br />';
                    }

                    $techniques->closeCursor();

                ?>
                <h2>Techniques Refusées</h2>
                <?php

                    $sth5 = $bdd->prepare("SELECT id FROM membres WHERE username = '$username'");
                    $sth5->execute();
                    $result = $sth5->fetchAll(PDO::FETCH_ASSOC);
                    $id_membre = implode($result[0]);

                    // Récupération des techniques du personnage
                    $techniques = $bdd->query("SELECT nom, rang, description, axe1, axe2, id FROM techniques WHERE id_membre = '$id_membre' AND Etat='1'");

                    // Affichage de chaque technique
                    while ($donnees = $techniques->fetch())
                    {
                        
                        echo '<p><strong>' . htmlspecialchars($donnees['nom']) . '</strong> <br /> ' 
                        . htmlspecialchars($donnees['axe1']) . '/' . htmlspecialchars($donnees['axe2']) . ' - <strong> Rang ' . htmlspecialchars($donnees['rang']) . '</strong><br />
                        ' . htmlspecialchars($donnees['description']) . '</p> <br />';
                    }

                    $techniques->closeCursor();

                ?>
                </div>

            </div>

        </section>

        <footer>

        </footer>

    </body>

</html>




<br /><a href="logout.php">Se déconnecter</a>

<?php

}
else{
    header('Location: index.php');
}

?>