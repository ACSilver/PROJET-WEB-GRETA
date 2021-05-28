<?php

require("Model/connect.php");

$db = new db_connector(DB_DATABASE);

$connexion = $db->connexion();

$AfficherListeStagiaire = ("SELECT nom FROM stagiaire");

$query = $connexion->prepare($AfficherListeStagiaire);

$query->execute();

$stagiaire = $query->fetchAll();

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
    <div class="contenu centrer " style="margin-top: 5%;">

        <p class=" centrer">Bienvenue, sur la page des stagiaires! <br /> Merci d'utiliser notre service de technologie 2.0 !</p>

        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Stagiaires</th>
                    </tr>
                </thead>

                <!-- <input type="button" class="btn btn-success" value="Ajouter Promotion" > -->
                <input type="button" class="btn btn-warning" value="Modifier Stagiaire">
                <input type="button" class="btn btn-danger" value="Désactiver Stagiaire">

                <tbody>
                    <?php
                    foreach ($stagiaire as $key => $value) {
                        echo '<tr><td><br> <a href="" >' . $value['nom'] . '</a></td>';
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