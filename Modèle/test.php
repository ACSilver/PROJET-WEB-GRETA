test
<?php
//requete pour ajouter un stagiaire
$req=$connexion->exec("INSERT INTO 'stagiaire'(nom, courriel, promo, dateEntree, IDformation) VALUES($nom, $courriel, $promo, $dateEntree, $IDformation)");
//
//requete pour ajouter un formateur
$req=$connexion->exec("INSERT INTO 'formateur'(nom, IDformation) VALUES($nom, $IDformation)");
//
//requete pour ajouter une formation
$req=$connexion->exec("INSERT INTO 'formation(nom, nbheure)' VALUES($nom, $nbheure)");
//
//requete pour desactiver une formation
$req=$connexion->exec("UPDATE formation SET actif=0");
//
//requete pour desactiver un formateur
$req=$connexion->exec("UPDATE formateur SET actif=0");
//
//requete pour ajouter une grille de competence
$req=$connexion->exec("INSERT INTO 'grille(IDlibellé)' VALUES($IDlibellé)");