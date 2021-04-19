<?php


require("../../Model/connect.php");



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
    <title>Formations Admin</title>
    <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../../css/style.css" type="text/css" />
    <script src="../../js/bootstrap.js"> </script>
</head>

<header>

    <?php include("headeradmin.php"); ?>

</header>




<body class="centrer  "> 



    <div class="contenu centrer " style="margin-top: 5%;" >

        <p class=" centrer">Bienvenue, sur la page des promotions! <br /> Merci d'utiliser notre service de technologie 2.0 !
        </p>

        <div>


        <table>

        </table>



            <table class="table">
                <thead>
                    <tr>
                        <th>Promotions <php? > $formation</php></th>
                        
                    </tr>
                </thead>

                <!-- <input type="button" class="btn btn-success" value="Ajouter Promotion" > -->
                <input type="button" class="btn btn-warning" value="Modifier formation" >
                <input type="button" class="btn btn-danger" value="Désactiver formation" >

                <tbody>

                    <?php 
                        foreach($promos as $key => $value) {
                            echo '<tr><td><br> <a href="" >'.$value['promo'].'</a></td>';
                            
                                
                            echo '</tr>';

                        }
                            

                    ?>


                    
                </tbody>


            </table>


        </div>


    </div>

    

</body>
<footer>
    <?php include("../footer.php"); ?>
</footer>

</html>