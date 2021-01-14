<?php

/* 
*  Important
*  Ici on utilise une fonction pour la lisibilité du code
*  La bonne pratique est de créer une DAO
*/

//Aide sur le CRUD : https://www.cloudways.com/blog/introduction-php-data-objects/

function update_user($in_table, $name, $value, $id) {
	
	require_once( 'model/connect.php' );

	/* 
	*  Mise à jour d'une donnée dans un tuple
	*/

	try {
		
		$db = new db_connector(DB_DATABASE); //connexion à la base
		
		$connexion = $db->connexion();
		
		//$sql = "UPDATE $in_table SET $name='?' WHERE id=?";
		$sql = "UPDATE ".$in_table." SET ".$name."='".$value."' WHERE id=".$id;
		
		$query = $connexion->prepare($sql);
		
		$query->execute( );
	
		return true; //retourne vrais si tout c'est bien passé
			
	}

	catch(Exception $e) {
		//Dbug
		//echo $e->getMessage();
		return false;
	}

	//on libère les requettes sur la base
	$query->closeCursor();
	$connexion = null;
	$db->close();

}
