<?php

namespace App\Controllers;
use Lib\Controller;
use App\Models\Feriado;
use App\Repositorios\RepositorioFeriado;


class FeriadoController extends Controller {
    public function index($request, $response){
       $controller = 'Feriado';
       $action = 'index';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }    
    
    public function cadastro($request, $response){
       $controller = 'Feriado';
       $action = 'cadastro';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }    
    
    public function cadastrar($request, $response){       
        $nome_feriado = filter_input(INPUT_POST, "tx_nome_feriado", FILTER_SANITIZE_STRING); 
        $data_feriado = filter_input(INPUT_POST, "tx_data_feriado", FILTER_SANITIZE_STRING);
        
        $btn_salvar = filter_input(INPUT_POST, "btn_salvar", FILTER_SANITIZE_STRING);
        
        if($btn_salvar){
            $obj = new Feriado($nome_feriado, $data_feriado);
            $repositorio = new RepositorioFeriado();
            $retorno = $repositorio->insertFeriado($obj);
            
            if(!is_null($retorno) && $retorno > 0){
                return $this->response->withHeader('Location', '/feriado/index?r='.$retorno['id']);            
            }else{
                return $this->response->withHeader('Location', '/feriado/index?r=error');                
            }    
        }else{
            return $this->response->withHeader('Location', '/feriado/index?r=error');
        }
    }
    
    public function edicao($request, $response, $args = null){
       $controller = 'Feriado';
       $action = 'edicao';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;  
       $vars['args'] = $args;       
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function editar($request, $response, $args = null){
        $btn_salvar = filter_input(INPUT_POST, "btn_salvar", FILTER_SANITIZE_STRING);
        
        $id_feriado = filter_input(INPUT_POST, "tx_id_feriado", FILTER_SANITIZE_STRING);
        $nome = filter_input(INPUT_POST, "tx_nome_feriado", FILTER_SANITIZE_STRING);
        $data_feriado = filter_input(INPUT_POST, "tx_data_feriado", FILTER_SANITIZE_STRING);
        
        if($btn_salvar && $id_feriado > 0)
        {
            $repositorio = new RepositorioFeriado();
            $atual = $repositorio->getObj($id_feriado);
            $retorno = $repositorio->updateFeriado($atual, new Feriado($nome, $data_feriado));
            return $this->response->withHeader('Location', "/feriado/index?id={$atual->getId_feriado()}");                
        }else{
            return $this->response->withHeader('Location', "/dashboard");
        }
    }
    
    public function excluir($request, $response, $args = null){        
        $_id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
        
        if($_id > 0)
        {
            $repositorio = new RepositorioFeriado();
            $atual = $repositorio->getObj($_id);
            $retorno = $repositorio->excluirFeriado($atual);
            return $this->response->withHeader('Location', "/feriado/index?id={$atual->getId_feriado()}");                
        }else{
            return $this->response->withHeader('Location', "/dashboard");
        }
    }
}
