<?php  

session_start();
session_destroy();

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
</html>
