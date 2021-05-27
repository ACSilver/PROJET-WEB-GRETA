<?php 

require("connect.php");

$idcomp=$_POST["IDcomp"];
$valueNote=$_POST["noteValue"];

echo $_POST["IDcomp"].' '.$_POST["noteValue"];

$db = new db_connector(DB_DATABASE);
$connexion = $db->connexion();
$req = "UPDATE notes SET valeur=$valueNote WHERE IDcompetence=$idcomp"; //Récuperer le dernier ID de la table
$query = $connexion->prepare($req);
$query->execute();
$resultat = $query->fetchAll();

?>