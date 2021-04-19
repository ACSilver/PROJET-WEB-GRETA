

<?php

class AdminUser {

    public function __construct() {
        

    }
    // lien de l'Accueil
    public function Accueil() {
        include ('Vue/admin/accueiladmin.php');
    }



    // lien formateurs avec ses actions

    public function Formateurs() {

        require("Model/connect.php");

        $db = new db_connector(DB_DATABASE);

        $connexion = $db->connexion();


        $AfficherListeFormateur=("SELECT nom FROM formateur");

        $query = $connexion->prepare($AfficherListeFormateur);

        $query->execute();

        $resultat = $query->fetchAll();

        include ('Vue/admin/formateuradmin.php');
    }


    public function AjouterFormateur() {
        include ('Vue/admin/creationformateur.php');
    }


    
    
}