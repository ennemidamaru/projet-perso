<?php 

    include('config.php');  	

    try {
        $bdd = new \PDO($dsn, $bdd_username, $bdd_password, $options);
   } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
   }
   return $bdd;