<?php 

class ReqGrille{
    function getIdModileGrille($formation) {
        try {
            $db = new db_connector(DB_DATABASE);
            $connexion = $db->connexion();
            $req = "SELECT IDmodeleGrille  FROM modelegrille where IDformation = $formation"; //Récuperer le dernier ID de la table
            $query = $connexion->prepare($req);
            $query->execute();
            $resultat = $query->fetchAll();
        }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat['0']['IDmodeleGrille'] ;
    }


    function getLibelle($idmodeleGrille) {
        try {
            $db = new db_connector(DB_DATABASE);
            $connexion = $db->connexion();

            $req = "SELECT * FROM libelle where IDmodeleGrille = $idmodeleGrille  "; //Récuperer le dernier ID de la table
            
            $query = $connexion->prepare($req);
            $query->execute();
            $Libelle = $query->fetchAll();
        }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $Libelle;
    }



    function getReference($idlibelle) {
        try {
            $db = new db_connector(DB_DATABASE);
            $connexion = $db->connexion();

            $req = "SELECT * FROM ref where IDlibelle = $idlibelle  "; //Récuperer le dernier ID de la table
            
            $query = $connexion->prepare($req);
            $query->execute();
            $ref = $query->fetchAll();
        }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $ref;
    }


    
    function getCompetence($idRef) {
        try {
            $db = new db_connector(DB_DATABASE);
            $connexion = $db->connexion();

            $req = "SELECT * FROM competence where IDref = $idRef  "; //Récuperer le dernier ID de la table
            
            $query = $connexion->prepare($req);
            $query->execute();
            $comp = $query->fetchAll();
        }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $comp;
    }


    function getNote($idComp) {
        try {
            $db = new db_connector(DB_DATABASE);
            $connexion = $db->connexion();

            $req = "SELECT valeur FROM notes where IDcompetence = $idComp  "; //Récuperer le dernier ID de la table
            
            $query = $connexion->prepare($req);
            $query->execute();
            $note = $query->fetchAll();
        }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $note;
    }




}
















?>