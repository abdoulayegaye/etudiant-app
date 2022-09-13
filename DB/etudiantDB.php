<?php

    #La fonction getEtudiants() retourne toutes les infos des étudiants
    /**
     * Tableau indicé ou indexé : PDO::FETCH_NUM = 3
     * Tableau associatif : PDO::FETCH_ASSOC = 2
     */
    function getEtudiants()
    {
        global $db;
        $sql = "SELECT *
                From etudiant e, classe c
                WHERE e.idClasse = c.idC
                ORDER BY nom ASC";
        #$date = $db-> query($sql);//Exécuter la requete
        #$resultats = $date ->fetchAll();//Formater les données en tableau php
        #return $resultats;//Retourner les données
        return $db->query($sql)->fetchAll(2);

    }
    function moyenneGeneral()
    {
        global $db;
        $sql = "SELECT AVG(moyenne) as moyG FROM etudiant";
        return $db->query($sql)->fetch(2);
    }
    function getClasses()
    {
        global $db;
        $sql = "SELECT * FROM classe ORDER BY libelle ASC";
        return $db->query($sql)->fetchAll(2);
    }
    function generateMatricule()
    {
        return"ET-".date('Ymdhis')."@ISI";
    }
    function addEtudiant($nom, $prenom, $moyenne, $classe)
    {
        global $db;
        $matricule = generateMatricule();
        $sql = "INSERT INTO etudiant VALUES(null, '$matricule', '$nom', '$prenom', $moyenne, $classe)";
        return $db->exec($sql);//0 ou 1
    }
    function getEtudiantById($id)
    {
        global $db;
        $sql = "SELECT * 
                FROM etudiant e, classe c 
                WHERE e.idClasse = c.idC 
                AND idE = $id";
        return $db->query($sql)->fetch();
    }
    function updateEtudiant($id, $nom, $prenom, $moyenne, $classe)
    {
        global $db;
        $sql = "UPDATE etudiant 
                SET nom = '$nom',
                    prenom = '$prenom',
                    moyenne = '$moyenne',
                    idClasse = $classe
                WHERE idE = $id";
        return $db ->exec($sql); // 0 ou 1
    }
    function deleteEtudiant($id)
    {
        global $db;
        $sql = "DELETE 
                FROM etudiant 
                WHERE idE = $id";
        return $db->query($sql); // 0 ou 1
    }