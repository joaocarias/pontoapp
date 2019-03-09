<?php

namespace Lib;

use App\Models\LogAcesso;
use App\Repositorios\RepositorioLogAcesso;

/**
 * Description of Controller
 *
 * @author branc
 */
class Controller {
    private $container;
    
    function __construct($container) {
        $this->container = $container;
    }
    
    public function __get($property) {
        if($this->container->{$property}){
            return $this->container->{$property};
        }
    }
    
    public function registrarLogin($status, $login, $id_usuario = 0){
        $logAcesso = new LogAcesso($id_usuario, $login, $status);
        $repositorioLogAcesso = new RepositorioLogAcesso();
        return $repositorioLogAcesso->insertObj($logAcesso);
    }
    
    public function validarAcesso(){        
        if(isset($_SESSION['id_usuario'])
                && !is_null($_SESSION['id_usuario']) 
                && $_SESSION['id_usuario'] > 0
                && isset($_SESSION['id_pessoa'])
                && !is_null($_SESSION['id_pessoa'])
                && $_SESSION['id_pessoa'] > 0                
                && isset($_SESSION['logado']) 
                && !is_null($_SESSION['logado'])
                && $_SESSION['logado'] > 0
           ){
            return true;
        }else{
            return false;
        }
    }
    
    public function validarEmpresa(){
        if(isset($_SESSION['id_empresa']) 
                && $_SESSION['id_empresa'] > 0
                && !is_null($_SESSION['id_empresa'])
           ){
            return true;
        }else{
            return false;
        }
        
    }
}
