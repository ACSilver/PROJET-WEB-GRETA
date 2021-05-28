<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
  <title>Grille stagiaire</title>
  <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../../css/style.css" type="text/css" />
  <script src="../../js/bootstrap.js"> </script>
  <script src="../../js/script.js"> </script>
  <script src="../js/jquery-1.9.0.min.js"></script>
</head>


<header>

  <?php include("Vue/admin/headeradmin.php"); ?>

</header>   


<body class="centrer  ">
    <?php // print_r($_SESSION["grilleStagiaire"])?>
    <div class="contenu centrer" style="margin-top: 5%;" ;>
        <h1 class="attestationTitre">Attestation de Compétences</h1>
        <h2 class="formationTitre">//IntituléFormation</h2> <!-- value -> variable-->
        <p class="descriptionAttestation">Cette attestation vise à expliciter, formaliser et valoriser les compétences
                développées à l'occasion d'un parcours de formation.</p>

        <table class="grid-header">
            <tr>
                <td class="grid-user-infos" style="width: 30%;">NOM Prénom</td>
                <td class="border1"></td> <!-- value -> variable-->
            </tr>
            <tr>
                <td class="grid-user-infos">Intitulé de la formation</td>
                <td class="border1"></td><!-- value -> variable-->
            </tr>
            <tr>
                <td class="grid-user-infos">Date d'entrée en formation</td>
                <td class="border1"></td><!-- value -> variable-->
            </tr>
            <tr>
                <td class="grid-user-infos">Date de fin de formation</td>
                <td class="border1"></td><!-- value -> variable-->
            </tr>
            <tr>
                <td class="grid-user-infos">Durée du parcours</td>
                <td class="border1"></td><!-- value -> variable-->
            </tr>
        </table>

        <div class="fonctions">
            <h3>Outils de génération de grille</h3>
            <input type="text" id="name" class="gen-input" placeholder="Name">
            <input type="button" class="add-libelle" value="Ajouter libellé">
            <input type="button" class="add-ref" value="Ajouter référence">
            <input type="button" class="add-skill" value="Ajouter compétence">
            <input type="button" class="edit-row" value="Editer">
            <input type="button" class="delete-row" value="Supprimer">
            <br><br>
            <input type="text" class="gen-input" placeholder="Nom de la grille">
            <!-- <a href="http://localhost/PROJET-WEB-GRETA/Vue/grilleAdmin.php?saved=true"><input type="button" value="Sauvegarder grille"></a> -->
            <input type="button" class="save-grid" value="Sauvegarder grille">
        </div>

        <div>
            <table id="grille" class="grille">
                <!-- Code si on veut ajouter un libellé-->
                <!-- Code si on veut ajouter une ligne référence-->
                    
                    <?php

                    if ($_SESSION["grilleStagiaire"]) {
                        foreach($_SESSION["grilleStagiaire"] as $key => $value){
                            echo '
                                <tr class="gridLibelle">
                                    <td class="border1">
                                        <input type="checkbox" name="record">
                                    </td>
                                    <td class="border1 libelle" name="edit-item">
                                        '.$_SESSION["grilleStagiaire"][$key]['libelle']    .'</td> <!-- value -> variable-->
                                    <td class="border1 colonne1">Non acquis</td>
                                    <td class="border1 colonne2">Partiellement acquis</td>
                                    <td class="border1 colonne1">Acquis à un niveau suffisant</td>
                                    <td class="border1 colonne1">Dépassé</td>
                                </tr>
                            ';
        
                            foreach ($_SESSION["grilleStagiaire"][$key][3] as $numref => $value){
                            
                                echo ' 
                                <tr class="gridRef">
                                    <td class="border1">
                                        <input type="checkbox" name="record">
                                    </td>
                                    <td class="border1 reference1" name="edit-item" >'. $_SESSION["grilleStagiaire"][$key][3][$numref]['descRef']   .'</td>
                                    <td class="border1 reference"></td>
                                    <td class="border1 reference"></td>
                                    <td class="border1 reference"></td>
                                    <td class="border1 reference"></td>
                                    
                                </tr> ';
            
                                foreach ($_SESSION["grilleStagiaire"][$key][3][$numref][3] as $numcompt => $value){
                                    
                                    //Permet pour chaque bouton radio de la grille d'avoir une valeur unique associée à l'attribut name
                                    $radioButtonName=strval($_SESSION["grilleStagiaire"][$key][3][$numref]["IDref"]).strval($_SESSION["grilleStagiaire"][$key][3][$numref][3][$numcompt]['IDcompetence']);
                                    $NoteValue=$_SESSION["grilleStagiaire"][$key][3][$numref][3][$numcompt][3][0]["valeur"];
                                
                                    echo '
                                    <tr class="gridComp" id='.$_SESSION["grilleStagiaire"][$key][3][$numref][3][$numcompt]["IDcompetence"].'>
                                        <td class="border1">
                                            <input type="checkbox" name="record">
                                        </td>
                                        <td class="border1 competence" name="edit-item" >'. $_SESSION["grilleStagiaire"][$key][3][$numref][3][$numcompt]['descCompetence']   .'</td>
                                        <td class="border1">
                                            <input type="radio" id="0" onclick="changeNote(this)" name='.$radioButtonName.' '.($NoteValue==0 ? "checked" : " " ).'/>
                                        </td>
                                        <!-- Regrouper les boutons sous un même "name" pour en selectionner un seul du groupe-->
                                        <td class="border1">
                                            <input type="radio" id="1" onclick="changeNote(this)" name='.$radioButtonName.' '.($NoteValue==1 ? "checked" : " " ).'/>
                                        </td>
                                        <td class="border1">
                                            <input type="radio" id="2" onclick="changeNote(this)" name='.$radioButtonName.' '.($NoteValue==2 ? "checked" : " " ).'/>
                                        </td>
                                        <td class="border1">
                                            <input type="radio" id="3" onclick="changeNote(this)" name='.$radioButtonName.' '.($NoteValue==3 ? "checked" : " " ).'/>
                                        </td>
                                    </tr>
                                    ';
                                }
                            }
                        }
                    } 
                    ?> 
            </table>
        </div>

        <div class="signature">
            <p>Fait à //NomVille, le :</p>
            <p>Nom, prénom et qualité du signataire : </p>
            <p>Signature et cachet :</p>
        </div>
     </div>
</body>


</html>