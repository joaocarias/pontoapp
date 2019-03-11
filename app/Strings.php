<?php

namespace App;
use App\Models\ItemString;

class Strings {  
     
    public $strings = array();
    
    public function __construct(){ 
        $dashboard = new ItemString('dashboard','Dashboard', 'fa-dashboard', 'dashboard', 'Dashboard');            
        $this->strings[$dashboard->getId()] = $dashboard ;
        
        $empresa = new ItemString('empresa','Empresa', 'fa-building', 'empresa', 'Empresa');
        $this->strings[$empresa->getId()] = $empresa;
        
        $usuario = new ItemString('usuario','Usuário', 'fa-user', 'usuario', 'Usuário');
        $this->strings[$usuario->getId()] = $usuario;
    }
    
    function getStrings() {
        return $this->strings;
    }
   
    function setStrings($strings) {
        $this->strings = $strings;
    }
}
