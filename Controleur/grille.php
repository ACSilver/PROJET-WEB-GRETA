<?php

require("Model/ReqGrille.php");


class GrilleCompetence{



    function FindGrille ($nomStagiaire,$idformation,$promo)
    {
        require('Model/connect.php');

        if (isset($_SESSION["grilleStagiaire"])) {
            unset($_SESSION["grilleStagiaire"]);
        }

        $this->Promo = $promo;
        $this->Formation = $idformation;
        $this->nomStagiaire = $nomStagiaire;

        $grille = new ReqGrille;

        // avec tout ces infomartion on arive a avoir le modile grille

        $idModele = $grille->getIdModileGrille($this->Formation,$this->Promo);

        $this->idmodele = $idModele;

        $ListLibelle =  $grille->getLibelle($this->idmodele);

        foreach ($ListLibelle as $key => $value){
            $ListRef =  $grille->getReference($ListLibelle[$key]['IDlibelle']);;
            array_push($ListLibelle[$key],$ListRef);
            foreach ($ListRef as $keyref => $ref) {
                $ListComp=  $grille->getCompetence($ListLibelle[$key][3][$keyref]['IDref']);
                array_push($ListLibelle[$key][3][$keyref],$ListComp);
                foreach ($ListComp as $keycomp => $value) {
                    $lenote =  $grille->getNote($ListLibelle[$key][3][$keyref][3][$keycomp]['IDcompetence']);
                    array_push($ListLibelle[$key][3][$keyref][3][$keycomp],$lenote);
                }
            }
        }

        $_SESSION["grilleStagiaire"] = $ListLibelle;

        include_once ('Vue/grillev2.php');


    }





    

}

?>