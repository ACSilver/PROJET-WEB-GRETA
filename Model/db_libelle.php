<?php 
    require("connect.php");

    $db = new db_connector(DB_DATABASE);
    $connexion = $db->connexion();
    $dbIdLibelle = "SELECT IDlibellé FROM libelle ORDER BY IDlibellé DESC LIMIT 1;"; //Récuperer le dernier ID de la table

    $query = $connexion->prepare($dbIdLibelle);
    $query->execute();
    $resultat = $query->fetchAll();
    $idLibelle= $resultat['0']['IDlibellé'];
?>