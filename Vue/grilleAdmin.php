<?php 
    require('../Model/db_libelle.php');
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js"></script>
    <script src="../js/jquery-1.9.0.min.js"></script>
    <script>
        $(document).ready(function(){ //Quand la page sera chargée entièrement
            $(".add-libelle").click(function(){
                var name = $("#name").val();
                var markup = '<tr id="libelle"><td class="border1 "><input type="checkbox" name="record"></td><td class="border1 libelle" name="edit-item">'+name+'</td><td class="border1 colonne1">Non acquis</td><td class="border1 colonne2">Partiellement acquis</td><td class="border1 colonne1">Acquis à un niveau suffisant</td><td class="border1 colonne1">Dépassé</td></tr>';
                $(".grille").append(markup);
                // $idLibelle+=1 => Recuperation de l'ID du dernier tuple de la table libelle pour ne pas créer de doublons car on genre les ID
            });
            $(".add-ref").click(function(){
                var name = $("#name").val();
                var markup1 = '<tr id="reference"><td class="border1 "><input type="checkbox" name="record"></td><td class="border1 reference1" name="edit-item">'+name+'</td><td class="border1 reference"></td><td class="border1 reference"></td><td class="border1 reference"></td><td class="border1 reference"></td></tr>';
                $(".grille").append(markup1);
            });
            $(".add-skill").click(function(){
                count++;
                var name = $("#name").val();
                var markup2 = '<tr id="competence"><td class="border1"><input type="checkbox" name="record"></td><td class="border1 competence" name="edit-item">'+name+'</td><td class="border1"><input type="radio" name="competence'+count+'" /></td><td class="border1"><input type="radio" name="competence'+count+'" /></td><td class="border1"><input type="radio" name="competence'+count+'" /></td><td class="border1"><input type="radio" name="competence'+count+'" /></td></tr>';
                $(".grille").append(markup2);
            });
            $(".delete-row").click(function(){
                $(".grille").find('input[name="record"]').each(function(){ //On cherche dans la grille tout les descendants avec name=record et pour chacun, si il est coché, on supprime la ligne parent
                    if($(this).is(":checked")){
                        $(this).parents("tr").remove();
                    }
                });
            });
            $(".edit-row").click(function(){
                var name = $("#name").val();
                $(".grille").find('input[name="record"]').each(function(){
                    if($(this).is(":checked")){
                        $(this).parents("tr").children('td[name="edit-item"]').html(name); //je n'arrive pas avec .siblings()
                    }
                });
            });
        }); 
        
    </script>
</head>

<body>
    <h1 class="attestationTitre">Attestation de Compétences</h1>
    <h2 class="formationTitre">//IntituléFormation</h1> <!-- value -> variable-->
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
            <input type="button" class="" value="Sauvegarder grille">
        </div>

        <div>
            <table class="grille">

                <!-- Code si on veut ajouter un libellé-->
                <tr id="libelle">
                    <td class="border1 ">
                        <input type="checkbox" name="record">
                    </td>
                    <td class="border1 libelle" name="edit-item">
                        //NomLibelle</td> <!-- value -> variable-->
                    <td class="border1 colonne1">Non acquis</td>
                    <td class="border1 colonne2">Partiellement acquis</td>
                    <td class="border1 colonne1">Acquis à un niveau suffisant</td>
                    <td class="border1 colonne1">Dépassé</td>
                </tr>
    
                <!-- Code si on veut ajouter une ligne référence-->
                <tr id="reference">
                    <td class="border1 ">
                        <input type="checkbox" name="record">
                    </td>
                    <td class="border1 reference1" name="edit-item" >//Référence</td>
                    <td class="border1 reference"></td>
                    <td class="border1 reference"></td>
                    <td class="border1 reference"></td>
                    <td class="border1 reference"></td>
                </tr>
    
                <!-- Code si on veut ajouter une ligne compétence-->
                <tr id="competence">
                    <td class="border1">
                        <input type="checkbox" name="record">
                    </td>
                    <td class="border1 competence" name="edit-item" >//Compétence</td>
                    <td class="border1">
                        <input type="radio" name="competence1" />
                    </td>
                    <!-- Regrouper les boutons sous un même "name" pour en selectionner un seul du groupe-->
                    <td class="border1">
                        <input type="radio" name="competence1" />
                    </td>
                    <td class="border1">
                        <input type="radio" name="competence1" />
                    </td>
                    <td class="border1">
                        <input type="radio" name="competence1" />
                    </td>
                </tr>
            </table>
        </div>
        

        <div class="signature">
            <p>Fait à //NomVille, le :</p>
            <p>Nom, prénom et qualité du signataire : </p>
            <p>Signature et cachet :</p>
        </div>
</body>

</html>