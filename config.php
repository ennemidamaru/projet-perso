<?php

        $bdd_username = 'root';
        $bdd_password = '';
        $bdd_host = 'localhost';
        $bdd_name = 'fp-perso-aera';
        $charset = 'utf8';

        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $dsn = "mysql:host=$bdd_host;dbname=$bdd_name;charset=$charset";