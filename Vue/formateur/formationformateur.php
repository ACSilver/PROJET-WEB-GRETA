<?php

require("Model/connect.php");

$db = new db_connector(DB_DATABASE);

$connexion = $db->connexion();

$AfficherListeFormation=("SELECT IDformation,nom FROM formation");
//$AfficherPromotion=("SELECT promo FROM promo");
// $AfficherFormationEtPromo=("SELECT nom 
//                             FROM formation 
//                             WHERE IDformation=$IDformation 
//                             UNION SELECT promo 
//                             FROM promo 
//                             INNER JOIN lienpromo 
//                             WHERE promo.IDpromo = lienpromo.IDpromo 
//                             AND IDformation=$IDformation");

$query = $connexion->prepare($AfficherListeFormation);
//$query2 = $connexion->prepare($AfficherPromotion);

$query->execute();
//$query2->execute();

$resultat = $query->fetchAll();
//$promos = $query2->fetchAll();

?>
<!DOCTYPE html>
<html>

<head>
  <title>Formations Formateur</title>
  <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../../css/style.css" type="text/css" />
  <script src="../../js/bootstrap.js"> </script>
</head>

<header>

  <?php include("headerformateur.php"); ?>

</header>


<<body class="centrer  "> 
    <div class="contenu centrer " >
        <p class=" centrer">Bienvenue, sur la page des formations! <br /> Merci d'utiliser notre service de technologie 2.0 !</p>

        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Formations</th>
                    </tr>
                </thead>

                <input type="button" class="btn btn-success" value="Ajouter formation" >
                <!-- <input type="button" class="btn btn-warning" value="Modifier formation" > -->
                <!-- <input type="button" class="btn btn-danger" value="Désactiver formation" > -->

                <tbody>
                    <?php 
                        foreach($resultat as $key => $value) {
                            echo "<tr><td><br> <a href='ListePromoFormateur?formation=".$value['IDformation']."'>".$value['nom'].'</a></td>';   
                            echo '</tr>';
                            // echo '<pre>';
                            // print_r($resultat);
                            // echo '</pre>';
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