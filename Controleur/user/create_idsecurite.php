

<?php

class user {

    public function __construct() {
    }


    public function Create_IdSecurite(){



        $db = new db_connector(DB_DATABASE);

        $connexion = $db->connexion();





        $data = $connexion->prepare("");


        $data->execute();
        return 'a idsecurte was added' ;



    }

    
}