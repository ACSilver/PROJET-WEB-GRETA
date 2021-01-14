<?php

/* 
*  Important
*  Ici on utilise une fonction pour la lisibilité du code
*  La bonne pratique est de créer une DAO
*/

//Aide sur le CRUD : https://www.cloudways.com/blog/introduction-php-data-objects/

function read_users($in_table, $from=null, $total=null) {

	require_once( 'model/connect.php' );

	/* 
	*  Lecture des tuples dans une table
	*  En option on selectionne le premier tuple au choix : $from
	*  On retourne le nombre total de tuples choisi : $total
	*/

	try {
		
		$db = new db_connector(DB_DATABASE); //connexion à la base
		
		$connexion = $db->connexion();
		
		$sql = "SELECT * FROM $in_table";
		
		$arr_selector = null;
		
		if( $from>=0 and $total>=1 ) {
			$sql .= " ORDER BY id LIMIT ?, ?";
			$arr_selector = [ $from, $total ];
		}
		
		$query = $connexion->prepare($sql);
		
		$query->execute( $arr_selector );
		
		return $query->fetchAll();	
			
	}

	catch(Exception $e) {
		//Dbug
		//echo $e->getMessage();
		return "Impossible de récupérer les données sur la table :".$in_table;
	}

	//on libère les requettes sur la base
	$query->closeCursor();
	$connexion = null;
	$db->close();

}

