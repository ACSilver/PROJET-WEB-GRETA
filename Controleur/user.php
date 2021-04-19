
<?php

class User {

    public function __construct() {
       echo "Bienvenue sur la page Utilisateur";
       $this->_other();
    }

    private function _other() {
        echo "<br />Ceci une autre fonction sur la page Utilisateur";
    }
    
}