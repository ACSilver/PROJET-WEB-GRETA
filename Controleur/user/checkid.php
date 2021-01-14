<?php 
	//on peut appeler cette fonction quand on a besoin avec ( incluced )
$_SESSION['valide'] = "";

  function mdpcheck($id){ 
  	// after connecting with the data base
  	require('Modèle/connect.php');
  	//check if the id is correct
  	try {
		
		$db = new db_connector(DB_DATABASE); //connexion à la base
		
		$connexion = $db->connexion();
		
		// $sql = "SELECT * FROM admin a inner join formateur f on f.IDsecurité = p.IDsecurité  inner join stagiaire s on s.IDsecurité = p.IDsecurité where a.IDsecurité =" .$id ;		

		$sql = "SELECT grainDeSel FROM securité where IDsecurité = $id";

		$query = $connexion->prepare($sql);

		$query->execute();

		$resultat = $query->fetchAll();

		print_r($resultat);

		$count = $query->rowCount();

		if ($count > 0) {
			$salt = $resultat['0']['grainDeSel'];
			echo $salt;
		}
		else{
			echo "<script>alert(\"la variable est nulle\")</script>";
		}
	}
	catch(Exception $e) {
		//Dbug
		//echo $e->getMessage();
		return "Impossible de récupérer les données sur la table :";
	}

}

?>