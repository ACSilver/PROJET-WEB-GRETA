<?php

class StagiaireUser {

    public function __construct() {
    }
    // lien de l'Accueil
    public function Accueil() {
        include ('Vue/stagiaire/accueilstagiaire.php');
    }
    
    public function  AffichePageFormations() {
        include_once ('Vue/stagiaire/formationstagiaire.php');
    }
}