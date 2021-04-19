
<?php

class About {
    
    private static function getName() {
       return __CLASS__;
    }
    
    public function __construct() {
       echo "Bienvenue sur la page ".
               $this->getName()
               ." sans aucune autre fonction.";
    }
    
}