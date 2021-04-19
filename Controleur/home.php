
<?php

class Home {

    public function __construct() {
       echo "Bienvenue sur la page d'intro";
       $this->_first_other();
       $this->_second_other();
    }

    private function _first_other() {
        echo "<br />Ceci est une premiere fonction sur la page Home";
    }
    
    private function _second_other() {
        echo "<br />Ceci est une deuxieme fonction sur la page Home";
    }
    
}