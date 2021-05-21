<?php

require("Model/connect.php");

$db = new db_connector(DB_DATABASE);

$connexion = $db->connexion();

$AfficherListeStagiaire=("SELECT nom FROM stagiaire");
//$AfficherListeFormation=("SELECT nom FROM formation");
$AfficherPromotion=("SELECT promo FROM promo");
// $AfficherFormationEtPromo=("SELECT nom 
//                             FROM formation 
//                             WHERE IDformation=$IDformation 
//                             UNION SELECT promo 
//                             FROM promo 
//                             INNER JOIN lienpromo 
//                             WHERE promo.IDpromo = lienpromo.IDpromo 
//                             AND IDformation=$IDformation");


//$query = $connexion->prepare($AfficherListeFormation);
$query2 = $connexion->prepare($AfficherPromotion);
$query3 = $connexion->prepare($AfficherListeStagiaire);

//$query->execute();
$query2->execute();
$query3->execute();

//$resultat = $query->fetchAll();
$promos = $query2->fetchAll();
$stagiaire = $query3->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>
  <title>Stagiaires Admin</title>
  <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../../css/style.css" type="text/css" />
  <script src="../../js/bootstrap.js"> </script>
</head>

<header>

  <?php include("headeradmin.php"); ?>

</header>


<<body class="centrer  "> 
    <div class="contenu centrer " style="margin-top: 5%;" >

        <p class=" centrer">Bienvenue, sur la page des stagiaires! <br /> Merci d'utiliser notre service de technologie 2.0 !</p>

        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Stagiaires <?php $formation  ?></th>
                    </tr>
                </thead>

                <!-- <input type="button" class="btn btn-success" value="Ajouter Promotion" > -->
                <input type="button" class="btn btn-warning" value="Modifier Stagiaire" >
                <input type="button" class="btn btn-danger" value="Désactiver Stagiaire" >

                <tbody>
                    <?php 
                        foreach($stagiaire as $key => $value) {
                            echo '<tr><td><br> <a href="Stagiaires" >'.$value['nom'].'</a></td>'; 
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<footer>
  <?php include("Vue/footer.php"); ?>
</footer>

</html>