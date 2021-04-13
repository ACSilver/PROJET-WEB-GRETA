<?php 
    require("connect.php");

    function getIdLibelle() {
        try {
            $db = new db_connector(DB_DATABASE);
            $connexion = $db->connexion();
            $dbIdLibelle = "SELECT IDlibellé FROM libelle ORDER BY IDlibellé DESC LIMIT 1;"; //Récuperer le dernier ID de la table
            $query = $connexion->prepare($dbIdLibelle);
            $query->execute();
            $resultat = $query->fetchAll();
            $idLibelle = $resultat['0']['IDlibellé'];
        }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $idLibelle;
    }

    function addFormation($nom,$nbHeures) {
        try {
            $db = new db_connector(DB_DATABASE);
            $connexion = $db->connexion();
            $addFormation="INSERT INTO `formation`(`nom`, `nbHeures`) VALUES ('$nom',$nbHeures)";
            $query = $connexion->prepare($addFormation);
            $query->execute();
        }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    $dbIdLibelle = "SELECT IDlibellé FROM libelle ORDER BY IDlibellé DESC LIMIT 1;";

    function getIdFormation($nom) {
        try {
            $db = new db_connector(DB_DATABASE);
            $connexion = $db->connexion();
            $idFormation = "SELECT `IDformation` FROM `formation` WHERE `nom`='$nom';";
            $query = $connexion->prepare($idFormation);
            $query->execute();
            $resultat = $query->fetch();
            
        }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }

        return $resultat[0];
    }

    function addGridModelToFormation($idFormation) {
        try {
            $db = new db_connector(DB_DATABASE);
            $connexion = $db->connexion();
            $addGridModel="INSERT INTO `modelegrille`(`IDformation`) VALUES ($idFormation)";
            $getLastId ="SELECT LAST_INSERT_ID()";
            $query = $connexion->prepare($addGridModel);
            $query1 = $connexion->prepare($getLastId);
            $query->execute();
            $query1->execute();
            $resultat = $query1->fetch();

        }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat[0]; // On retourne l'ID du modèle créé
    }

?> 