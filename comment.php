<?php

        session_start();
        include('bdd.php');

        $comment = $_POST['comment'];
        $actorFormation = 'Formation&co';
        $actorProtect = 'Protectpeople';
        $actorDSA = 'DSAFrance';
        $actorCDE = 'CDE';

        if (isset($_POST['submit_comment']) && $_POST['submit_comment'] == 'OkFormation'){
            if (isset($comment) && strlen($comment) > 0) {
                echo 'ok';
            }
            else
            {
                echo 'Veuillez entrer un commentaire.';?>
                <a href="IndexConnected.php">Retourner sur l'espace membre.</a>

                <?php
            }
        }
        else
        {
            //header('Location: IndexConnected.php');
        }

        if (isset($_POST['submit_comment']) && $_POST['submit_comment'] == 'OkProtect'){
            if (isset($comment) && strlen($comment) > 0) {

                echo 'ok';

            }
            else
            {
                echo 'Veuillez entrer un commentaire.';?>
                <a href="IndexConnected.php">Retourner sur l'espace membre.</a>

                <?php
            }

        }
        else
        {
            //header('Location: IndexConnected.php');
        }


        
        if (isset($_POST['submit_comment']) && $_POST['submit_comment'] == 'OkDSA'){
            if (isset($comment) && strlen($comment) > 0) {

                echo 'ok';

            }
            else
            {
                echo 'Veuillez entrer un commentaire.';?>
                <a href="IndexConnected.php">Retourner sur l'espace membre.</a>

                <?php
            }
        }
        else
        {
            //header('Location: IndexConnected.php');
        }



        if (isset($_POST['submit_comment']) && $_POST['submit_comment'] == 'OkCDE'){
            if (isset($comment) && strlen($comment) > 0) {

                echo 'ok';

            }
            else
            {
                echo 'Veuillez entrer un commentaire.';?>
                <a href="IndexConnected.php">Retourner sur l'espace membre.</a>

                <?php
            }
        }
        else
        {
            //header('Location: IndexConnected.php');
        }







?>