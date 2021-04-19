

<?php

class AdminUser {

    public function __construct() {
        include ('Vue/admin/accueiladmin.php');
    //    $this->_first_other();
    //    $this->_second_other();
    }

    private function _first_other() {
        echo "<br />Ceci est une premiere fonction sur la page d'admin";
    }
    
    private function _second_other() {
        echo "<br />Ceci est une deuxieme fonction sur la page d'admin";
    }
    
}