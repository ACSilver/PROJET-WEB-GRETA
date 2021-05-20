<?php


require("Model/connect.php");



$db = new db_connector(DB_DATABASE);

$connexion = $db->connexion();


$AfficherListeFormation=("SELECT nom FROM formation");
$AfficherPromotion=("SELECT promo FROM promo");
// $AfficherFormationEtPromo=("SELECT nom 
//                             FROM formation 
//                             WHERE IDformation=$IDformation 
//                             UNION SELECT promo 
//                             FROM promo 
//                             INNER JOIN lienpromo 
//                             WHERE promo.IDpromo = lienpromo.IDpromo 
//                             AND IDformation=$IDformation");


$query = $connexion->prepare($AfficherListeFormation);
$query2 = $connexion->prepare($AfficherPromotion);


$query->execute();
$query2->execute();

$resultat = $query->fetchAll();
$promos = $query2->fetchAll();






?>

<!DOCTYPE html>
<html>

<head>
  <title>Formateurs Admin</title>
  <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../../css/style.css" type="text/css" />
  <script src="../../js/bootstrap.js"> </script>
</head>

<header>

  <?php include("headeradmin.php"); ?>

</header>


<body class="centrer  ">


  <div class="contenu centrer " style="margin-top: 5%;">
    <p class=" centrer">Bienvenue, sur la page des promotions! <br /> Merci d'utiliser notre service de technologie 2.0
      !
    </p>

    <div>
      <form action="action.php" method="post">

        <input placeholder="Nom" type="text">
        <input placeholder="Prénom" type="text">
        <input placeholder="Age" type="text">
        <input placeholder="Mot de passe" type="text">
        <input placeholder="Confirmer mot de passe" type="text">

        <div class="col-sm-3">
          <select class="form-control">
            <option value="1">BTS SIO</option>
            <option value="1">BTS Compta</option>
            <option value="1">Bts Waseem</option>
        </div>

        </select>
        <div class="col-sm-3">

          <select class="form-control">
            <option value="+1">2020-2021)</option>
            <option value="1">2019-2020</option>
            <option value="1">2018-2019</option>
          </select>
        </div>
        <p><input type="submit" value="OK">Créer nouveau formateur</p>

      </form>



    </div>


  </div>





</body>
<footer>
  <?php include("Vue/footer.php"); ?>
</footer>

</html>