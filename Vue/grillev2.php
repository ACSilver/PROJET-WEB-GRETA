<?php 



$libelle_de_grille = array('libelle1','libelle2','libelle3','libelle4');

$reference = array('libelle1','libelle2','libelle3','libelle4');

$competence_de_reference = array('libelle1','libelle2','libelle3','libelle4');
    
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>





        <div>
            <a href="Vue/grillev2">grille</a>
            <table id="grille" class="grille">
                <!-- Code si on veut ajouter un libellé-->

    
                <!-- Code si on veut ajouter une ligne référence-->

                <?php


                foreach($libelle_de_grille as $lib){
                    echo '
                        <tr class="gridLibelle">
                            <td class="border1">
                                <input type="checkbox" name="record">
                            </td>
                            <td class="border1 libelle" name="edit-item">
                                '.$lib.'</td> <!-- value -> variable-->
                            <td class="border1 colonne1">Non acquis</td>
                            <td class="border1 colonne2">Partiellement acquis</td>
                            <td class="border1 colonne1">Acquis à un niveau suffisant</td>
                            <td class="border1 colonne1">Dépassé</td>
                        </tr>
                    ';




                    foreach ($reference as $ref){
                    
                        echo ' 
                        <tr class="gridRef">
                            <td class="border1">
                                <input type="checkbox" name="record">
                            </td>
                            <td class="border1 reference1" name="edit-item" >'.$ref.'</td>
                            <td class="border1 reference"></td>
                            <td class="border1 reference"></td>
                            <td class="border1 reference"></td>
                            <td class="border1 reference"></td>
                            
                        </tr> ';
    
    
    
                        foreach ($competence_de_reference as $compt){
    
                            echo '
                            <tr class="gridComp">
                                <td class="border1">
                                    <input type="checkbox" name="record">
                                </td>
                                <td class="border1 competence" name="edit-item" >'.$compt.'/td>
                                <td class="border1">
                                    <input type="radio" name="competence" />
                                </td>
                                <!-- Regrouper les boutons sous un même "name" pour en selectionner un seul du groupe-->
                                <td class="border1">
                                    <input type="radio" name="competence" />
                                </td>
                                <td class="border1">
                                    <input type="radio" name="competence" />
                                </td>
                                <td class="border1">
                                    <input type="radio" name="competence" />
                                </td>
                            </tr>
                            ';
                        }
                    }
                }

                
                ?>

            </table>
        </div>



</body>

</html>