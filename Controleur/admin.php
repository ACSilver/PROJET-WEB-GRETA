

<?php

class AdminUser {

    public function __construct(){

    }

    // lien de l'Accueil
    public function Accueil(){

        if (isset($_SESSION['loggedin'])){
            if (isset($_SESSION['usertype']) and $_SESSION['usertype'] == "0"){
                include_once ('Vue/admin/accueiladmin.php');
                //$this->Accueil();
            }
            else{
                header("LOCATION: http://localhost");
            }
        }
        else{
            header("LOCATION: http://localhost");
        }
    }



    // lien formateurs avec ses actions

    public function Formateurs() {


        // require("Model/connect.php");

        // $db = new db_connector(DB_DATABASE);

        // $connexion = $db->connexion();


        // $AfficherListeFormateur=("SELECT nom FROM formateur");

        // $query = $connexion->prepare($AfficherListeFormateur);

        // $query->execute();

        // $resultat = $query->fetchAll();

        include_once ('Vue/admin/formateuradmin.php');
    }


    public function AjouterFormateur() {
        include_once ('Vue/admin/creationformateur.php');
    }


    
    
}