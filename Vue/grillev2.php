<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

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
        
                                echo '
                                <tr class="gridComp">
                                    <td class="border1">
                                        <input type="checkbox" name="record">
                                    </td>
                                    <td class="border1 competence" name="edit-item" >'. $_SESSION["grilleStagiaire"][$key][3][$numref][3][$numcompt]['descCompetence']   .'</td>
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
                }

                

                
                ?>

            </table>
        </div>



</body>

</html>