<?php

class Route {

    private $_uri=array();
    private $_method=array();
    
    /**
     * @param type $uri
     * Ajoute et construit un anuaire d'URLS à retourner
     * @param type $method
     * Ajoute les méthodes (sous-classes) choisies
     */
    
    public function add($uri, $method = null) {
        
        $this->_uri[] = '/'.trim($uri, '/');
        
        if ($method != null) {
            $this->_method[] = $method;
        }
        
    }

    /**
     * Retourne la liste construite du menu 
     */
    
    public function get() {
                
        foreach ($this->_uri as $key => $value) {
            
            $this_method = $this->_method[$key];
            $this_name = is_string($this_method) ? $this_method : $value;

            echo "<a href='".dirname($_SERVER['SCRIPT_NAME']).$value."'>".$this_name."</a><br />";
       
        }
        
    }

    /**
     * Reception des requettes $uri et routage de la valeur
     * Construit la sous-classe selectionnée
     * Accepte les fonctions personnelles au niveau de la racine
     */
    
    public function submit() {
        
        //echo $uriGetParam = isset($_GET['uri']) ? '/'.$_GET['uri'] : '/';
        $uriGetParam = isset($_GET['uri']) ? '/'.$_GET['uri'] : '/';
        
        foreach ($this->_uri as $key => $value) {
            
            if( preg_match("#^$value$#",$uriGetParam) ){

                
                $this_method = $this->_method[$key];
                
                if( is_string($this_method) ){
                    //$useMethod = $this->_method[$key];
                    new $this_method();
                } else {
                    call_user_func($this_method);
                }
                
            }
            
        }
        
    }
    
}

