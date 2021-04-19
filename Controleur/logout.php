
<?php

class Logout {

    public function __construct() {
        include 'Vue/VueAuthentification.php';  
        $this->_other();
    }

    public function logout(){
        $_SESSION['loggedin'] = false;
        return $_SESSION['loggedin'];
        exit;
    }

    private function _other() {
        //echo "<br />Ceci est une autre fonction sur la page login";
    }
    
}