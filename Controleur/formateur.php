<?php

class FormateurUser {

    public function __construct() {
        

    }
    // lien de l'Accueil
    public function Accueil() {
        include ('Vue/formateur/accueilformateur.php');
    }
    public function  AffichePageFormations() {
        include_once ('Vue/formateur/formationformateur.php');
    }
    
    public function  AffichePageStagiaires() {
        include_once ('Vue/formateur/stagiaireformateur.php');
    }
    
    public function  AfficheListeStagiaires() {
        include_once ('Vue/formateur/listestagiaireformateur.php');
    }
    
    public function AjouterFormation() {
        include_once ('Vue/formateur/creationformateur.php');
    }
    
    public function AffichePageUneFormation() {
        include ('Vue/formateur/listepromoformateur.php');
    }
}



