<?php


function load_class_dir($mydir){
    foreach (glob("./".$mydir."/*.php") as $classfile){
        include_once $classfile;
    }
}


include_once('Controleur/route.php');
include_once('Controleur/authenticate.php');


// load_class_dir('src');
load_class_dir('Controleur');
//load_class_dir('Controleur/user');


$route = new Route();


$route->add('/', 'login' );


$route->add('/admin', function(){ 
    $example = new AdminUser; 
    $example -> Accueil();
});


$route->add('/admin/creationFormateur', function(){ 
    $example1 = new AdminUser; 
    $example1 -> AjouterFormateur();
});


$route->add('/deconnexion', function(){ 
    $example = new Logout();
    $example -> logout(); 
    if ($_SESSION['loggedin'] == false) {
        header("LOCATION: http://localhost");
    }
} );


$route->add('/auth', function(){ 
    $example = new Auth();
    $example -> ValidatedUser(); 
    if ($_SESSION['loggedin'] == true) {
        
        if ($_SESSION['usertype'] ==  '0') {
            header("LOCATION: http://localhost/admin");
        }
        elseif ($_SESSION['usertype'] ==  '1') {
            header("LOCATION: http://localhost/prof");
        }
        elseif ($_SESSION['usertype'] ==  '2') {
            header("LOCATION: http://localhost/stagaire");
        }
    }
    else {
        header("LOCATION: http://localhost");
    }
} );


// $route->add('/test/hello', function(){ echo "routage suplémentaire"; } );
//$route->get('');
$route->submit('');
?>