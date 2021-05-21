<?php

require("Model/ReqGrille.php");

class GrilleCompetence{



    function FindGrille ($nomStagiaire,$idformation,$promo)
    {
        $this->Promo = $promo;
        $this->Formation = $idformation;
        $this->nomStagiaire = $nomStagiaire;

        $grille = new ReqGrille;

        // avec tout ces infomartion on arive a avoir le modile grille

        $idModele = $grille->getIdModileGrille($this->Formation,$this->Promo);

        $this->idmodele = $idModele;





        // $ListLibelle =  $grille->getLibelle($this->idmodele);

        

        // $ListRef =  $grille->getReference($ListLibelle[0]['IDlibelle']);;

        // array_push($ListLibelle[0],$ListRef);


        // $ListComp=  $grille->getCompetence($ListLibelle[0][3][1]['IDref']);

        // array_push($ListLibelle[0][3][1],$ListComp);

        // $lenote =  $grille->getNote($ListLibelle[0][3][1][3][0]['IDcompetence']);

        // array_push($ListLibelle[0][3][1][3][0],$lenote);

        // echo '<pre>';
        // print_r($ListLibelle) ;







        $ListLibelle =  $grille->getLibelle($this->idmodele);

        foreach ($ListLibelle as $keylib => $lib) {
            
            $ListRef =  $grille->getReference($ListLibelle[$lib]['IDlibelle']);

            foreach ($ListRef as $keyref => $ref) {

                $ListComp=  $grille->getCompetence($ListLibelle[$lib][$ref][1]['IDref']);

                foreach ($ListComp as $key => $value) {


                    $lenote =  $grille->getNote($ListLibelle[$lib][$ref][1][3][0]['IDcompetence']);

                    array_push($ListLibelle[$lib][$ref][1][3][0],$lenote);

                }
            }

        }

        echo '<pre>';
        print_r($ListLibelle) ;



        






    }

        







}

?>