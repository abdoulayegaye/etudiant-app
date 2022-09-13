<?php
    #Paramétres de connexion
    define('HOST', 'localhost');
    define('DATABASE', 'etudiant_db');
    define('USER', 'root');
    define('PASSWORD', '');
    
    #Chaine de connexion
    $dsn = 'mysql:host='.HOST.';dbname='.DATABASE.';charset=utf8';
    try {
        $db = new PDO($dsn, USER, PASSWORD);
        //echo 'Connexion Réussie !';
    } catch (PDOException $e) {
        die('Erreur de connexion de la base de données !');
    }