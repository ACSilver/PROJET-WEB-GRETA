<?php

require("Model/connect.php");

$IDformation = $_GET["formation"]; // On recupere l'id de la promotion dans l'URL

$db = new db_connector(DB_DATABASE);

$connexion = $db->connexion();

$AfficherPromotion = ("SELECT promo,promo.IDpromo 
                    FROM promo
                    INNER JOIN lienpromo ON promo.IDpromo=lienpromo.IDpromo
                    INNER JOIN formation ON lienpromo.IDformation=formation.IDformation
                    WHERE formation.IDformation=$IDformation;");

$query = $connexion->prepare($AfficherPromotion);

$query->execute();

$promos = $query->fetchAll();

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
    <div class="contenu centrer " >

        <p class=" centrer">Bienvenue, sur la page des promotions! <br />Merci d'utiliser notre service de technologie 2.0 !</p>

        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Promotions</th>
                    </tr>
                </thead>

                <!-- <input type="button" class="btn btn-success" value="Ajouter Promotion" > -->
                <input type="button" class="btn btn-warning" value="Modifier formation">
                <input type="button" class="btn btn-danger" value="Désactiver formation">

                <tbody>
                    <?php
                    foreach ($promos as $key => $value) {
                        echo "<tr><td><br> <a href='Stagiaires?formation=" . $IDformation . "&promo=" . $value['IDpromo'] . "'>" . $value['promo'] . '</a></td>';
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