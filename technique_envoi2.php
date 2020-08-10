<?php

    session_start();
    include('bdd.php');
    
    if (isset($_POST['submit_tech']) && $_POST['submit_tech'] == 'Ok') { 

        /* Récupération des informations concernant la technique dans des variables */
        $nom = $_POST['nom_technique'];
        $rang = $_POST['rang'];
        $description = $_POST['description_technique'];
        $axe1 = $_POST['axe1'];
        $axe2 = $_POST['axe2'];

        /* Récupération de l'id du créateur de la technique */
        $username = $_SESSION['login'];
        $sth2 = $bdd->prepare("SELECT id FROM membres WHERE username = '$username'");
        $sth2->execute();
        $result = $sth2->fetchAll(PDO::FETCH_ASSOC);
        $id_membre = implode($result[0]);

        /* Envoi de la technique en validation */
        $query = $bdd->prepare('INSERT INTO techniques (id_membre, nom, rang, description, axe1, axe2, Etat, periode_reception) VALUES("'.$id_membre.'", "'.$nom.'", "'.$rang.'", "'.$description.'", "'.$axe1.'", "'.$axe2.'", 0, NOW() );');
		$query->execute();
		header('Location: IndexConnected.php');
		exit();

        
    }






?>