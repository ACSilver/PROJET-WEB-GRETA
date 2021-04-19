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

session_start();


// tout les route de Admin





$route->add('/info', function(){ 
    $example = new info; 
});


$route->add('/admin', function(){ 

    $example = new AdminUser; 
    $example -> Accueil();
});

$route->add('/admin/Formateurs/creationFormateur', function(){ 
    $example1 = new AdminUser; 
    $example1 -> AjouterFormateur();
});

$route->add('/admin/Formateurs', function(){ 
    $example1 = new AdminUser; 
    $example1 -> Formateurs();
});


// tout les route de Formateurs

$route->add('/formateur', function(){ 
    $example = new FormateurUser; 
    $example -> Accueil();
});

// tout les route de Stagiaires

$route->add('/stagiaire', function(){ 
    $example = new StagiaireUser; 
    $example -> Accueil();
});


// Tout les route de Auth


$route->add('/', 'login' );


$route->add('deconnexion', function(){ 
    $example = new Auth();
    $example -> logout(); 
    session_destroy();
    header("LOCATION: http://localhost");
} );


$route->add('/auth', function(){ 
    $example = new Auth();
    $example -> ValidatedUser(); 
    if ($_SESSION['loggedin'] == true) {
        
        if ($_SESSION['usertype'] ==  '0') {
            header("LOCATION: http://localhost/admin");
        }
        elseif ($_SESSION['usertype'] ==  '1') {
            header("LOCATION: http://localhost/formateur");
        }
        elseif ($_SESSION['usertype'] ==  '2') {
            header("LOCATION: http://localhost/stagiaire");
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