<?php  

//je commence la session 
session_start();


// Je vérifie si l'utilisateur a tapé son identifiant et son mot de passe:


//l'id est vide par défaut , donc par défaut un message apparaît qui dit que l'id et mdp sont requis

if(empty($_POST["id"]) || empty($_POST["mdp"]))
	{
		$message = 'All fields are required';
		echo $message ;
	}
//si l'identifiant et le mdp ne sont pas vides
else
{
	//echo "there is a id and mdp" ;

	//nous sauvegardons les paramètres saisis par l'utilisateur sous $ id et $ mdp
	$id=$_POST['id'];
	$mdp=$_POST['mdp'];
	$_SESSION['id'] = $id;
	$_SESSION['mdp'] = $mdp;



	// nous incluons une page php, dans laquelle il y a une fonction utilisée pour valider l'id et msp
	include('Controleur/user/checkid.php');

	//nous appelons la fonction check_id qui est dans la page php que nous incluons précédemment, nous y insérons 2 paramètres ($ id, $ mdp)
	checkid($id,$mdp);

	//cette fonction nous renvoie une valeur appelée ( $ _SESSION ['value'] ) qui peut être égale à true ou false


	//nous sauvegardons cette fonction en l'appelant $ valide
	$valide = $_SESSION['valide'];
	//echo $valide;




	//nous vérifions si cette valeur est vraie ou fausse


	//si c'est vrai
	if ($valide == true) {
		echo ("its working");//TO DO
	}
	//si non
	else{
		echo ("its not working");//TO DO

	}

	//pour finir on arrête la session	
	session_destroy();

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



	<div class="corps" style="margin-top: 5%;" ;>
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
						<input type="password" name="mdp"  >
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
<footer class="">
<?php include("Vue/footer.php"); ?>
</footer>
</html>

