

<?php

class AdminUser {

    public function __construct() {

    }

    public function Accueil() {
        $_SESSION['pagename'] = 'accueiladmin';
        include ('Vue/admin/templateadmin.php');
    }

    public function AjouterFormateur() {
        $_SESSION['pagename'] = 'creationformateur';
        include ('Vue/admin/templateadmin.php');
    }
    
    
}