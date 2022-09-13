<?php

    #Paramétres de connexion
    define('HOST','localhost');
    define('DATABASE','etudiant_db');
    define('USER', 'root');
    define('PASSWORD', '');
    #Chaine de connexion
    $dsn = 'mysql:host='.HOST.';dbname='.DATABASE;
    try {
        $db = new PDO($dsn, USER, PASSWORD);
        echo 'Connexion Réussie';
    } catch (\PDOException $e) {
        die('Connexion Echouée !');
    }
