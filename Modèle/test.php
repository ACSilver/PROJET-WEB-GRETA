test
<?php
//requete pour ajouter un stagiaire
$req1=("INSERT INTO 'stagiaire'(nom, mail, dateEntree, promo, IDformation, IDsecurité) VALUES($nom, $mail, $dateEntree, $promo, $IDformation, $IDsecurité)");
//
//requete pour ajouter un formateur
$req2=("INSERT INTO 'formateur'(nom, IDformation, IDsecurité) VALUES($nom, $IDformation, $IDsecurité)");
//
//requete pour ajouter une formation
$req3=("INSERT INTO 'formation(nom, nbHeures)' VALUES($nom, $nbHeures)");
//
//requete pour desactiver une formation
$req4=("UPDATE formation SET actif=0 WHERE IDformation=$IDformation");
//
//requete pour desactiver un formateur
$req5=("UPDATE formateur SET actif=0 WHERE IDformateur=$IDformateur");
//
//requete pour ajouter une grille de competence
$req6=("INSERT INTO 'modeleGrille(IDformation)' VALUES($IDformation)");
//
//requete pour ajouter un libellé
$req7=("INSERT INTO 'libellé(libellé, IDmodeleGrille)' VALUES($libellé, $IDmodeleGrille)");
//
//requete pour ajouter une reference
$req8=("INSERT INTO 'ref(descRef, IDlibelle)' VALUES($descRef, $IDlibellé)");
//
//requete pour ajouter une competence
$req9=("INSERT INTO 'competence(descCompetence, IDref)' VALUES($descCompetence, $IDref)");
//
//requete pour modifier login/mdp
$req10=("UPDATE securite SET 'login'=$newlogin, mdp=$newmdp WHERE IDsecurité=$IDsecurité");
//
//requete pour modifier une formation
$req11=("UPDATE formation SET nom=$newnom, nbHeures=$newnbHeures WHERE IDformation=$IDformation");
//
//requete pour modifier un formateur
$req12=("UPDATE formateur SET nom=$newnom WHERE IDformateur=$newIDformateur");
//
//requete pour lier un formateur a une formation
$req13=("INSERT INTO 'lienformateur(IDformateur, IDformation)' VALUES($IDformateur, $IDformation)");
//
//requete pour modifier un stagiaire
$req14=("UPDATE stagiaire SET nom=$newnom, mail=$newmail, dateEntree=$newdateEntree, promo=$newpromo, IDformation=$newIDformation, IDsecurité=$newIDsecurité WHERE IDstagiaire=$IDstagiaire");
//
//requete pour modifier la note d'un stagiaire
$req15=("UPDATE notes SET valeur=$newvaleur WHERE IDcompetence=$IDcompetence AND IDstagiaire=$IDstagiaire");
//
//requete pour modifier un libellé
$req16=("UPDATE libelle SET libellé=$newlibelle WHERE IDlibellé=$IDlibellé");
//
//requete pour modifier une reference
$req17=("UPDATE ref SET descRef=$newdescRef WHERE IDref=$IDref");
//
//requete pour modifier une competence
$req18=("UPDATE competence SET descCompetence=$newdescCompetence WHERE IDcompetence=$IDcompetence");
//
//requete pour retirer le droit de modification a un stagiaire
$req19=("UPDATE stagiaire SET droitModification=0 WHERE IDstagiaire=$IDstagiaire");
//
//requete pour remettre le droit de modification a un stagiaire
$req20=("UPDATE stagiaire SET droitModification=1 WHERE IDstagiaire=$IDstagiaire");
//
//requete pour reactiver une formation
$req21=("UPDATE formation SET actif=1 WHERE IDformation=$IDformation");
//
//requete pour reactiver un formateur
$req22=("UPDATE formateur SET actif=1 WHERE IDformateur=$IDformateur");