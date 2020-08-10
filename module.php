<?php

        session_start();
        include('bdd.php');

        if(isset($_SESSION['login'])){
        ?><h2 style="text-align:center;">Module de Gestion de Fiches de Personnage [AERA]</h2>

        <a href="creation-fp.php">Générer une fiche de personnage</a><br />
        <a href="validation-techniques">Accéder à la validation de techniques</a><br />
        <a href="boutique.php">Gérer la boutique</a><br />
        <a href="aperçu-fp.php">Accéder à la fiche personnage d'un membre</a><?php

        }
        



     




















?>