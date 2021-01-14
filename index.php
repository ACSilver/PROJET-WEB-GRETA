<?php  

session_start();

// si il n'y a pas de id ou mdp on arrete
if(empty($_POST["id"]) || empty($_POST["mdp"]))
	{
		$message = 'All fields are required';
		echo $message ;
		session_destroy();
	}
else
{
	$id=$_POST['id'];
	$mdp=$_POST['mdp'];
	$_SESSION['id'] = $id;
	$_SESSION['mdp'] = $mdp;
	// appeler une fonction pour vérifier si l'identifiant existe
	include('Controleur/user/checkid.php');
	mdpcheck($id);


}
?>

<!DOCTYPE html>
<html>
<head>
<title>Mon site</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<div class="corps">
		<p>
		<div class="contenu">
			<h3>Page d'introduction</h3>
			<p>
			<form  action="index.php"  method="post" >
					<p>
						<label>Votre identifiant :</label>
						<input type="text" name="id"   >
					</p>
					<p>
						<label>Mot de passe :</label>
						<input type="password" name="mot_de_passe"  >
					</p>
					<p>
						<input type="submit" value="Valider">
					</p>
			</form>
			</p>
		</div>
		</p>
	</div>
</body>
</html>
