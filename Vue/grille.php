<link rel="stylesheet" href="../css/style.css">
<?php 

    class Grille
    {
        private $_agence;
        private $_formation;
        private $_nom;
        private $_prenom;
        private $_dateDebut; // Format DD/MM/YYYY
        private $_dateFin;
        private $_durée;
        private $_libelle;
        private $_reference;
        private $_role;
        
        //

        public function __construct()
        {
            
        }

        public function header(){

            echo '
            <table class="headerPartGauche">
                <tr>
                    <td>NOM Prénom</td>
                </tr>
                <tr>
                    <td>Intitulé de la formation</td>
                </tr>
                <tr>
                    <td>Date d\'entrée en formation</td>
                </tr>
                <tr>
                    <td>Date de fin de formation</td>
                </tr>
                <tr>
                    <td>Durée du parcours</td>
                </tr>
            </table>
            <table class="headerPartDroite">
                <tr>
                    <td>test</td>
                </tr>
                <tr>
                    <td>test</td>
                </tr>
                <tr>
                    <td>test</td>
                </tr>
                <tr>
                    <td>test</td>
                </tr>
                <tr>
                    <td>test</td>
                </tr>
            </table>';

        }

        public function premiereLigne(){

        }

        public function ajouterReference(){

        }

        public function supprimerReference(){

        }

        public function ajouterRole(){

        }

        public function supprimerRole(){

        }


    }

    $grille = new grille();
    $grille -> header();
?>

