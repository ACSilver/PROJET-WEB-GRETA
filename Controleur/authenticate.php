
<?php

class Auth {
    
    private static function getName() {
       return __CLASS__;
    }
    
    public function __construct() {
    }

    public function ValidatedUser() {
      
      session_start();

      // If the user is not logged in redirect to the login page...
      if (!isset($_SESSION['loggedin'])) {

         $_SESSION['loggedin'] = FALSE;
         return $_SESSION['loggedin'];
         exit;
      }

      require("Model/connect.php");



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


      if ($stmt = $connexion->prepare("SELECT  IDsecurite,mdp,statut FROM securite where identifiant = '$LoginName'")) {
         // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
         $stmt->execute();
         // Store the result so we can check if the account exists in the database.


         if ($stmt->rowCount() > 0) {
            $data = $stmt->fetchAll();
            print_r($data); 
            // Account exists, now we verify the password.
            echo '<br>  avant test de password';
            echo "<br>" . $data['0']['mdp'];
            $password = $data['0']['mdp'];
            echo "<br>" .$password;


            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            // if (password_verify($_POST['password'], $password)) {
            //    // Verification success! User has logged-in!
            //    // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            //    echo '<br> test3';
            //    session_regenerate_id();
            //    $_SESSION['usertype'] = $stmt ['statut'];
            //    echo $_SESSION['usertype'];
            //    $_SESSION['loggedin'] = TRUE;
            //    $_SESSION['name'] = $_POST['username'];
            //    $_SESSION['id'] = $id;
            // }


            if ($_POST['password'] == $password) {
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
        $_SESSION['loggedin'] = false;
        return $_SESSION['loggedin'];
        exit;
    }



}


