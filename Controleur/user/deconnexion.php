<?php

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	session_destroy();
    $index = $_SERVER['HOME'];
    header('Location: '.$index."'");
    
}


