<?php

//Parametres :
require_once("db_param.php");

//Classe principale de l'objet de connexion PDO
class db_connector {
	
	private $PARAM_nom_bd=null; // nom de la base de données en paramètre pour l'objet
	private $PARAM_utilisateur=DB_USERNAME; // nom d'utilisateur dans : model/db_param.php
	private $PARAM_mot_passe=DB_PASSWORD; // mot de passe de l'utilisateur dans : model/db_param.php
	private $PARAM_hote='localhost'; // l'hôte sera rarement different
	private $PARAM_port='3306'; // le port sera rarement different

	protected $pdo; //instance de la connexion
	
	/* 
	*  Constructeur de l'objet db_connector
	*/
	
	function __construct($db=null) {
		if(!empty($db))$this->PARAM_nom_bd = $db;
	}
	
	/* 
	*  Objet PDO Connexion 
	*  https://www.php.net/manual/fr/pdo.construct.php
	*/

	Public function connexion() {
		
		try {
			
			$dsn = 'mysql:host=' . $this->PARAM_hote . ';port=' . $this->PARAM_port;
			if(!empty($this->PARAM_nom_bd))$dsn .= ';dbname=' . $this->PARAM_nom_bd;
			
			//Options PDO sur les requettes :
			$options = array(
							PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
							PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
							PDO::ATTR_EMULATE_PREPARES => false 
						);	//Désactiver ATTR_EMULATE_PREPARES permet d'ajouter des variables dans un tableau sur les requettes execute()
			
			//Constructeur PDO :
			$this->pdo = new PDO( $dsn , $this->PARAM_utilisateur, $this->PARAM_mot_passe, $options );
			
			return $this->pdo;
			
		}
		 
		catch(Exception $e) {
			
			//Si la base est absente, redirection vers "?setup" pour la créer :
			if($e->getCode() === 1049) {
				die("<h2><a href='?setup'>Installation de la base de donnée</a></h2>");
			}
			
			$err = 'Erreur : '.$e->getMessage().'<br />';
			$err .= 'N° : '.$e->getCode();
			die('Une erreur est survenue !<br />'.$err);
		}
		
	}
	
	/* 
	*  Fermeture de l'objet PDO Connexion 
	*/

	Public function close() {
		$this->pdo = null;
	}
	
}

