<?php

//requete pour ajouter un stagiaire
$AjoutStagiaire=("INSERT INTO 'stagiaire'(nom, mail, IDformation, IDsecurité) VALUES($nom, $mail, $IDformation, $IDsecurité)");
//
//requete pour ajouter un formateur
$AjoutFormateur=("INSERT INTO 'formateur'(nom, IDformation, IDsecurité) VALUES($nom, $IDformation, $IDsecurité)");
//
//requete pour ajouter une formation
$AjoutFormation="INSERT INTO `formation`(`nom`, `nbHeures`) VALUES ('$nom',$nbHeures)";
//
//requete pour desactiver une formation
$DesactiveFormation=("UPDATE formation SET actif=0 WHERE IDformation=$IDformation");
//
//requete pour desactiver un formateur
$DesactiveFormateur=("UPDATE formateur SET actif=0 WHERE IDformateur=$IDformateur");
//
//requete pour ajouter une grille de competence
$AjoutGrille=("INSERT INTO 'modeleGrille(IDformation)' VALUES($IDformation)");
//
//requete pour ajouter un libellé
$AjoutLibelle=("INSERT INTO 'libellé(libellé, IDmodeleGrille)' VALUES($libellé, $IDmodeleGrille)");
//
//requete pour ajouter une reference
$AjoutReference=("INSERT INTO 'ref(descRef, IDlibelle)' VALUES($descRef, $IDlibellé)");
//
//requete pour ajouter une competence
$AjoutCompetence=("INSERT INTO 'competence(descCompetence, IDref)' VALUES($descCompetence, $IDref)");
//
//requete pour modifier login/mdp
$ModifierLoginMDP=("UPDATE securite SET 'login'=$newlogin, mdp=$newmdp WHERE IDsecurité=$IDsecurité");
//
//requete pour modifier une formation
$ModifierFormation=("UPDATE formation SET nom=$newnom, nbHeures=$newnbHeures WHERE IDformation=$IDformation");
//
//requete pour modifier un formateur
$ModifierFormateur=("UPDATE formateur SET nom=$newnom WHERE IDformateur=$IDformateur");
//
//requete pour lier un formateur a une formation
$LierFormateurFormation=("INSERT INTO 'lienformateur(IDformateur, IDformation)' VALUES($IDformateur, $IDformation)");
//
//requete pour lier un stagiaire et une formation (dateEntree et dateSortie peuvent etre nulle)
$LierStagiaireFormation=("INSERT INTO 'lienstagiaire(IDstagiaire, IDformation, dateEntree, dateSortie)' VALUES($IDstagiaire, $IDformation, $dateEntree, $dateSortie)");
//
//requete pour lier une promo a une formation
$LierPromoFormation=("INSERT INTO 'lienpromo(IDpromo, IDformation)' VALUES($IDpromo, $IDformation)");
//
//requete pour modifier un stagiaire
$ModifierStagiaire=("UPDATE stagiaire SET nom=$newnom, mail=$newmail, IDformation=$newIDformation, IDsecurité=$newIDsecurité WHERE IDstagiaire=$IDstagiaire");
//
//requete pour modifier la note d'un stagiaire
$ModifierNoteStagiaire=("UPDATE notes SET valeur=$newvaleur WHERE IDcompetence=$IDcompetence AND IDstagiaire=$IDstagiaire");
//
//requete pour modifier un libellé
$ModifierLibelle=("UPDATE libelle SET libellé=$newlibelle WHERE IDlibellé=$IDlibellé");
//
//requete pour modifier une reference
$ModifierReference=("UPDATE ref SET descRef=$newdescRef WHERE IDref=$IDref");
//
//requete pour modifier une competence
$ModifierCompetence=("UPDATE competence SET descCompetence=$newdescCompetence WHERE IDcompetence=$IDcompetence");
//
//requete pour retirer le droit de modification a un stagiaire
$RetirerDroitModification=("UPDATE stagiaire SET droitModification=0 WHERE IDstagiaire=$IDstagiaire");
//
//requete pour remettre le droit de modification a un stagiaire
$RemettreDroitModification=("UPDATE stagiaire SET droitModification=1 WHERE IDstagiaire=$IDstagiaire");
//
//requete pour reactiver une formation
$ActiverFormation=("UPDATE formation SET actif=1 WHERE IDformation=$IDformation");
//
//requete pour reactiver un formateur
$ActiverFormateur=("UPDATE formateur SET actif=1 WHERE IDformateur=$IDformateur");
//
//requete pour afficher une liste de formateur
$AfficherListeFormateur=("SELECT nom FROM formateur");
//
//requete pour afficher une liste de formation
$AfficherListeFormation=("SELECT nom FROM formation");
//
//requete pour afficher une liste de stagiaire
$ListeStagiaire=("SELECT nom FROM stagiaire");
//
//requete pour recuperer login + mot de passe
$RecupererLoginMDP=("SELECT identifiant FROM securite WHERE EXISTS(SELECT identifiant, mdp FROM securite WHERE identifiant=$identifiant AND mdp=$mdp)");
//
//requete pour afficher une competence
$AfficherGrille=("SELECT descCompetence FROM competence WHERE IDref=$IDref");
//
//requete pour afficher une reference
$AfficherReference=("SELECT descRef FROM ref WHERE IDlibelle=$IDlibelle");
//
//requete pour afficher promotion
$AfficherPromotion=("SELECT promo FROM promo");