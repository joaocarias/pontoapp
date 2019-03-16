<?php

namespace App\Controllers;

use Lib\Controller;
use App\Models\Funcao;
use App\Repositorios\RepositorioFuncao;

class FuncaoController extends Controller{
    public function index($request, $response){
       $controller = 'Funcao';
       $action = 'index';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function cadastro($request, $response){
       $controller = 'Funcao';
       $action = 'cadastro';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function edicao($request, $response, $args = null){
       $controller = 'Funcao';
       $action = 'edicao';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;  
       $vars['args'] = $args;       
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function cadastrar($request, $response){       
        $nome = filter_input(INPUT_POST, "tx_nome_funcao", FILTER_SANITIZE_STRING);         
        $btn_salvar = filter_input(INPUT_POST, "btn_salvar", FILTER_SANITIZE_STRING);
        
        if($btn_salvar){
            $obj = new Funcao($nome);
            $repositorio = new RepositorioFuncao();
            $retorno = $repositorio->insertFuncao($obj);
            
            if(!is_null($retorno) && $retorno > 0){
                return $this->response->withHeader('Location', '/funcao/index?r='.$retorno['id']);            
            }else{
                return $this->response->withHeader('Location', '/funcao/index?r=error');                
            }    
        }else{
            return $this->response->withHeader('Location', '/funcao/index?r=error');
        }
    }
    
    public function editar($request, $response, $args = null){
        $btn_salvar = filter_input(INPUT_POST, "btn_salvar", FILTER_SANITIZE_STRING);
        
        $id = filter_input(INPUT_POST, "tx_id_funcao", FILTER_SANITIZE_STRING);
        $nome = filter_input(INPUT_POST, "tx_nome_funcao", FILTER_SANITIZE_STRING);
        
        if($btn_salvar && $id > 0)
        {
            $repositorio = new RepositorioFuncao();
            $atual = $repositorio->getObj($id);
            $retorno = $repositorio->updateFuncao($atual, new Funcao($nome));
            return $this->response->withHeader('Location', "/funcao/index?id={$atual->getId_funcao()}");                
        }else{
            return $this->response->withHeader('Location', "/dashboard");
        }
    }
    
    public function excluir($request, $response, $args = null){        
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
        
        if($id > 0)
        {
            $repositorio = new RepositorioFuncao();
            $atual = $repositorio->getObj($id);
            $retorno = $repositorio->ExcluirFuncao($atual);
            return $this->response->withHeader('Location', "/funcao/index?id={$atual->getId_funcao()}");                
        }else{
            return $this->response->withHeader('Location', "/dashboard");
        }
    }
}
