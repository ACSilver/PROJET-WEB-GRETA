<?php


require("Model/connect.php");



$db = new db_connector(DB_DATABASE);

$connexion = $db->connexion();


$AfficherListeFormateur=("SELECT nom FROM formateur");



$query = $connexion->prepare($AfficherListeFormateur);


$query->execute();

$resultat = $query->fetchAll();


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
  <div class="centrer"  ;>
    <p class=" centrer">Bienvenue, sur la page des formateurs! <br /> Merci d'utiliser notre service de technologie 2.0
      !
    </p>
  </div>

  <table class="table contenu">
    <thead>
      <tr>
        <th>Formations</th>
        <th>Année de la promotion</th>
      </tr>
    </thead>

    
<div >
    <input type="button" class="btn btn-success" value="Ajouter Formateur"><a href="creationFormateur"></a>
    <input type="button" class="btn btn-warning" value="Modifier formateur">
    <input type="button" class="btn btn-danger" value="Désactiver formateur">
</div>
    <tbody>

      <?php 
        foreach($resultat as $key => $value) {
            echo '<tr><td><br> '.$value['nom'].'</td>';
            
            echo '<td><br>
                <div class="form-group">
                <label for="sel1"></label>
                <select class="form-control" id="sel1">';
                foreach($promos as $combo => $valeur) {
                    echo '<option>'.$valeur['promo'].' </option>';


                }
                        
            echo '</select></div></td>';    
            echo '</tr>';

        }
                   

    ?>
    </tbody>
  </table>
</body>

<footer>
  <?php include("Vue/footer.php"); ?>
</footer>

</html>