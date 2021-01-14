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
<title>Connexion</title>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<header>

<?php include("Vue/header.php"); ?>

</header>


<body class="centrer fond " > 



	<div class="corps" style="margin-top: 5%; " ;>
		<p>
		<div class="contenu centrer">
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
						<input type="submit" value="Valider"> <a href="Vue/admin.php">page</a>
					</p>
					
			</form>
			</p>
		</div>
		</p>
	</div>
	<?php include("Vue/footer.php"); ?>
</body>
<footer class="">

</footer>
</html>

