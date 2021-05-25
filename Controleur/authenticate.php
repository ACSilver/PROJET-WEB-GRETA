
<?php

class Auth {
    
    private static function getName() {
       return __CLASS__;
    }
    
    public function __construct() {
    }

    public function ValidatedUser() {

      // If the user is not logged in redirect to the login page...
      if (isset($_SESSION['loggedin']) and  isset($_SESSION['usertype']))  {

         if ($_SESSION['usertype'] ==  '0') {
            header("LOCATION: http://localhost/admin");
         }
        elseif ($_SESSION['usertype'] ==  '1') {
            header("LOCATION: http://localhost/formateur");
         }
        elseif ($_SESSION['usertype'] ==  '2') {
            header("LOCATION: http://localhost/stagiaire");
         }
         exit;

      }

      require_once("Model/connect.php");


      if (!isset($_POST['username'], $_POST['password']) ) {
         // Could not get the data that should have been sent.
         echo '<br> no password or username';
         $_SESSION['loggedin'] = FALSE;
         return $_SESSION['loggedin'];
         exit('Please fill both the username and password fields!');
      }

      $db = new db_connector(DB_DATABASE);

      $connexion = $db->connexion();


      $LoginName =  $_POST['username'];


      if ($stmt = $connexion->prepare("SELECT  IDsecurite,mdp,statut,grainDeSel FROM securite where identifiant = '$LoginName'")) {
         // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
         $stmt->execute();
         // Store the result so we can check if the account exists in the database.


         if ($stmt->rowCount() > 0) {
            // Account exists, now we verify the password.
            $data = $stmt->fetchAll();
            print_r($data); 
            $password = $data['0']['mdp'];
            $mdp = $_POST['password'];
            $grainDeSel= $data['0']['grainDeSel'];;

            //example de hachage de cours
            $hash_de_test = md5($mdp.$grainDeSel);

            if ($hash_de_test  === $password) {
               // Verification success! User has logged-in!
               // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
               $_SESSION['usertype'] = $data['0']['statut'];
               echo "<br>" .$_SESSION['usertype'];
               $_SESSION['loggedin'] = TRUE;
               $_SESSION['name'] = $_POST['username'];
            }
            else {
               // Incorrect password
               echo '<br> Incorrect password';
            }
         } else {
            // Incorrect username
            echo '<br> Incorrect username';
         }

      }else{
         echo '<br> Incorrect username';
      }
      return $_SESSION['loggedin'];
   }

    public function logout(){
         unset($_SESSION['loggedin']);
         unset($_SESSION['usertype']);
         unset($_SESSION['errormessage']);
         unset($_SESSION['name']);
         return $_SESSION['loggedin'];
    }

}


