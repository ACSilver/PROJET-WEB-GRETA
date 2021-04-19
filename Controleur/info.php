<?php

class info {

    public function __construct() {

        if (isset($_SESSION['loggedin'])){
            if (isset($_SESSION['usertype'])){
                echo $_SESSION['usertype'];
                echo '<br>'.$_SESSION['loggedin'];
            }
            else{
                echo $_SESSION['loggedin'];
            }
        }
        else{
            echo 'loggedin est false' ;
        }

    }

    
}