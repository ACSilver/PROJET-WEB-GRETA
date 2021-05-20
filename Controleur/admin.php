

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

    public function  AffichePageFormateurs() {
        include_once ('Vue/admin/formateuradmin.php');
    }


    public function AjouterFormateur() {
        include_once ('Vue/admin/creationformateur.php');
    }

    public function  AffichePageFormations() {
        include_once ('Vue/admin/formationadmin.php');
    }

    public function  AffichePageStagiaires() {
        include_once ('Vue/admin/stagiaireadmin.php');
    }

    public function AjouterFormation() {
        include_once ('Vue/admin/creationformateur.php');
    }

    public function AffichePageUneFormation() {
        include ('Vue/admin/listepromoadmin.php');
    }
    
    
}