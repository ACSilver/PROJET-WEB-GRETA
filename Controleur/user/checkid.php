<?php 
//on peut appeler cette fonction quand on a besoin avec ( incluced )


//j'ai créé une valeur que j'utiliserai plus tard
$_SESSION['valide'] = "";


//j'ai inclus la page php appelée (connect.php) dans laquelle il y a une fonction qui me permet de me connecter à la base de données phpmyadmin
require('Modèle/connect.php');


//j'ai créé une fonction appelée (checkid), cette fonction prend 2 paramètres
  function checkid($id,$mdp){ 

  	//j'essaye de me connecter à la base de données mais s'il y a un problème, une erreur apparaît
  	try {
		
		//je crée un nouvel objet appelé ($ db), cet objet est créé à partir de la classe db_connector
		$db = new db_connector(DB_DATABASE); //connexion à la base
		
		//je crée un objet appelé ($ connexion) qui inclut l'objet que j'ai créé avant et j'applique la fonction connexion dessust 
		$connexion = $db->connexion();
		//la fonction connexion est dans connect.php

		//maintenant je suis connecté à la base de données



		
		$getsalt = "SELECT grainDeSel FROM securité where IDsecurité = $id";
		//j'ai créé une requête SQL appelée ($getsalt) qui cherche à voir s'il existe une IDsécurité égale à ($id) dans la base de données


		//Prépare une requête à l'exécution
		$query = $connexion->prepare($getsalt);

		//exécuter la requête
		$query->execute();

		//enregistrer les résultats dans un objet appelé ($ resultat)
		$resultat = $query->fetchAll();

		//nous compterons le nombre de résultats recueillis
		$count = $query->rowCount();

		//pour vérifier si nous avons obtenu un résultat, utilisez ($ count). si $ count n'est pas 0 cela signifie que l'id existe
		if ($count > 0) {
			// s'il y a un résultat
			$salt = $resultat['0']['grainDeSel'];
			// on le sauvegarde



			require('Controleur/user/checkmdp.php');
			//j'ai inclus la page php appelée (checkmdp.php) dans laquelle il y a une fonction qui me permet de vérifier si l'utilisateur a tapé le bon mdp



			mdpcheck($id,$mdp,$salt,$connexion);
			//la fonction mdpcheck est dans checkmdp.php
			//cette fonction crée une valeur appelée ($_SESSION['this_password'])
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