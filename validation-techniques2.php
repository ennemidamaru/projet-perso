<?php

    session_start();
    include('bdd.php');
    $id_membre = $_SESSION['id_tech_valid'];
    
    if (isset($_POST['valid-tech-admin']) && $_POST['valid-tech-admin'] == 'Ok') {

        /* Récupération des informations concernant la technique dans des variables */
        $id_tech = $_SESSION['id_tech'];
        $nom = $_SESSION['nom_tech'];
        $rang = $_SESSION['rang'];
        $description = $_SESSION['description'];
        $axe1 = $_SESSION['axe1'];
        $axe2 = $_SESSION['axe2'];

        if($_POST['choix-admin'] == 'Oui'){ 
            echo 'cc';
            echo $id_tech; 

            /* Envoi de la technique validée */
            $query = $bdd->prepare('UPDATE techniques SET Etat=2, periode_reception=DATE(NOW()) WHERE id="'.$id_tech.'" ');
            $query->execute();
            
            header('Location: validation-techniques.php');
            exit();
        }
        if($_POST['choix-admin'] == 'Non'){ 

            /* Envoi de la technique refusée */
            $refus_comment = $_POST['motif-refus'];

            $query = $bdd->prepare('UPDATE techniques SET Etat=1, periode_reception=DATE(NOW()), refus_comment=".$refus_comment." WHERE id="'.$id_tech.'" ');
            $query->execute();

            header('Location: validation-techniques.php');
            exit();
        }
        if($_POST['choix-admin'] == 'Attente'){ 

            /* Envoi de la technique en attente */
            $refus_comment = $_POST['motif-refus'];
            
            $query = $bdd->prepare('UPDATE techniques SET Etat=0, periode_reception=DATE(NOW()), refus_comment="'.$refus_comment.'" WHERE id="'.$id_tech.'" ');            
            $query->execute();

            header('Location: validation-techniques.php');
            exit();
        }

        
    }






?>