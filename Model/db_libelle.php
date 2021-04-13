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
?> 