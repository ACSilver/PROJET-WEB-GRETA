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
			<form method="post" action="vue/page.php?article=intro"   >
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
<footer class="">
<?php include("Vue/footer.php"); ?>
</footer>
</html>

