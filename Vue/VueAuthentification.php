
<!DOCTYPE html>
<html>

<head>
	<title>Connexion</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/footer.css" type="text/css" />
	<script src="../../js/bootstrap.js"> </script>
</head>

<body class="centrer " ; style="height:auto; ">

	<?php include("Vue/header.php"); ?>

	<div class="contenu" style="margin-top: 5%; " ;>
		<p>
		<div>
			<h3>Page d'introduction</h3>
			<p>
			<form action="auth" method="post">
				<p>

					<label>Votre identifiant :</label>

					<input type="text" name="username" >


				</p>
				<p>
					<label>Mot de passe :</label>

					<input type="password" name="password" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">

					<span class="invalid-feedback"><?php echo $password_err; ?></span>

				</p>
				<p>
					<input type="submit" value="Valider"> 
				</p>



			</form>

			

			</p>

			<h1>			
				<?php 
					if (isset($_SESSION['errormessage'])) {
						echo  $_SESSION['errormessage'] ;
					}
				?>
			</h1>


		</div>


		</p>
	</div>
	<div> <?php include("Vue/footer.php"); ?> </div>
</body>

</html>