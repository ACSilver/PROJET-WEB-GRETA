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

if (isset($_SESSION['loggedin'])){
    if (isset($_SESSION['usertype'])){

        $route->add('/', function(){
            header("LOCATION: http://localhost/Accueil");
        } );


        $route->add('deconnexion', function(){ 
            $example = new Auth();
            $example -> logout(); 
            session_destroy();
            header("LOCATION: http://localhost");
        } );

        // toutes les routes de Admin

        if ($_SESSION['usertype'] == "0") {
            $route->add('Accueil', function(){ 
                $example = new AdminUser; 
                $example -> Accueil();
            });
            
            $route->add('creationFormateur', function(){ 
                $example1 = new AdminUser; 
                $example1 -> AjouterFormateur();
            });
            
            $route->add('Formateurs', function(){ 
                $example1 = new AdminUser; 
                $example1 -> AffichePageFormateurs();
            });

            $route->add('Formations', function(){ 
                $example1 = new AdminUser; 
                $example1 -> AffichePageFormations();
            });
            $route->add('Stagiaires', function(){ 
                $example1 = new AdminUser; 
                $example1 -> AffichePageStagiaires();
            });
            $route->add('ListeStagiaires', function(){ 
                $example1 = new AdminUser; 
                $example1 -> AfficheListeStagiaires();
            });

            $route->add('ListePromoAdmin', function(){ 
                $example1 = new AdminUser; 
                $example1 -> AffichePageUneFormation();
            });

        }
        
        // toutes les routes de Formateurs

        if ($_SESSION['usertype'] == "1") {
            $route->add('Accueil', function(){ 
                $example = new FormateurUser; 
                $example -> Accueil();
            });

            $route->add('Formations', function(){ 
                $example1 = new FormateurUser; 
                $example1 -> AffichePageFormations();
            });
            $route->add('Stagiaires', function(){ 
                $example1 = new FormateurUser; 
                $example1 -> AffichePageStagiaires();
            });
            $route->add('ListeStagiaires', function(){ 
                $example1 = new FormateurUser; 
                $example1 -> AfficheListeStagiaires();
            });

            $route->add('ListePromoAdmin', function(){ 
                $example1 = new FormateurUser; 
                $example1 -> AffichePageUneFormation();
            });


        }
        
        // toutes les routes de Stagiaires

        if ($_SESSION['usertype'] == "2") {

            $route->add('Accueil', function(){ 
                $example = new StagiaireUser; 
                $example -> Accueil();
            });
        }
    }
}
else{
    $route->add('/', 'login' );


    $route->add('/auth', function(){ 
        $example = new Auth();
        $example -> ValidatedUser(); 
        if ($_SESSION['loggedin'] == true) {
                header("LOCATION: http://localhost/Accueil");
        }
        else {
            header("LOCATION: http://localhost");
        }
    } );
}













// Tout les route de Auth




// $route->add('/test/hello', function(){ echo "routage suplémentaire"; } );
//$route->get('');
$route->submit('');
?>