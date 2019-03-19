<?php

namespace App;
use App\Models\ItemString;

class Strings {  
     
    public $strings = array();
    
    public function __construct(){ 
        $dashboard = new ItemString('dashboard','Dashboard', 'fas fa-tachometer-alt', 'dashboard', 'Dashboard');            
        $this->strings[$dashboard->getId()] = $dashboard ;
        
        $empresa = new ItemString('empresa','Empresa', 'fas fa-building', 'empresa', 'Empresa');
        $this->strings[$empresa->getId()] = $empresa;
        
        $usuario = new ItemString('usuario','Usuário', 'fas fa-user', 'usuario', 'Usuário');
        $this->strings[$usuario->getId()] = $usuario;
        
        $unidade = new ItemString('unidade','Unidade', 'fas fa-home', 'unidade', 'Unidade');
        $this->strings[$unidade->getId()] = $unidade;
        
        $feriado = new ItemString('feriado','Feriado', 'far fa-calendar-minus', 'feriado', 'Feriado');
        $this->strings[$feriado->getId()] = $feriado;
        
        $pdn = new ItemString('pdn','PDN', 'fab fa-creative-commons-pd-alt', 'pdn', 'PDN');
        $this->strings[$pdn->getId()] = $pdn;
        
        $funcao = new ItemString('funcao','Função', 'fas fa-pencil-ruler', 'funcao', 'Função');
        $this->strings[$funcao->getId()] = $funcao;
        
        $funcionario = new ItemString('funcionario','Funcionário', 'far fa-user', 'funcionario', 'Funcionário');
        $this->strings[$funcionario->getId()] = $funcionario;
        
        
        
        
 
        
    }
    
    function getStrings() {
        return $this->strings;
    }
   
    function setStrings($strings) {
        $this->strings = $strings;
    }
}
