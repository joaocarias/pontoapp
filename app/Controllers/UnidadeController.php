<?php

namespace App\Controllers;

use Lib\Controller;
use App\Models\Unidade;
use App\Repositorios\RepositorioUnidade;


class UnidadeController extends Controller {
    public function index($request, $response){
       $controller = 'Unidade';
       $action = 'index';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function cadastro($request, $response){
       $controller = 'Unidade';
       $action = 'cadastro';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function edicao($request, $response, $args = null){
       $controller = 'Unidade';
       $action = 'edicao';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;  
       $vars['args'] = $args;       
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function cadastrar($request, $response){       
        $nome_unidade = filter_input(INPUT_POST, "tx_nome_unidade", FILTER_SANITIZE_STRING); 
        
        $btn_salvar = filter_input(INPUT_POST, "btn_salvar", FILTER_SANITIZE_STRING);
        
        if($btn_salvar){
            $objUnidade = new Unidade($nome_unidade);
            $repositorioUnidade = new RepositorioUnidade();
            $retorno = $repositorioUnidade->insertUnidade($objUnidade);
            
            if(!is_null($retorno) && $retorno > 0){
                return $this->response->withHeader('Location', '/unidade/index?r='.$retorno['id']);            
            }else{
                return $this->response->withHeader('Location', '/unidade/index?r=error');                
            }    
        }else{
            return $this->response->withHeader('Location', '/unidade/index?r=error');
        }
    }
    
    public function editar($request, $response, $args = null){
        $btn_salvar = filter_input(INPUT_POST, "btn_salvar", FILTER_SANITIZE_STRING);
        
        $id_unidade = filter_input(INPUT_POST, "tx_id_unidade", FILTER_SANITIZE_STRING);
        $nome = filter_input(INPUT_POST, "tx_nome_unidade", FILTER_SANITIZE_STRING);
        
        if($btn_salvar && $id_unidade > 0)
        {
            $repositorio = new RepositorioUnidade();
            $unidadeAtual = $repositorio->getObj($id_unidade);
            $retorno = $repositorio->updateUnidade($unidadeAtual, new Unidade($nome));
            return $this->response->withHeader('Location', "/unidade/index?id={$unidadeAtual->getId_unidade()}");                
        }else{
            return $this->response->withHeader('Location', "/dashboard");
        }
    }
    
    public function excluir($request, $response, $args = null){        
        $id_unidade = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
        
        if($id_unidade > 0)
        {
            $repositorio = new RepositorioUnidade();
            $unidadeAtual = $repositorio->getObj($id_unidade);
            $retorno = $repositorio->ExcluirUnidade($unidadeAtual);
            return $this->response->withHeader('Location', "/unidade/index?id={$unidadeAtual->getId_unidade()}");                
        }else{
            return $this->response->withHeader('Location', "/dashboard");
        }
    }
    
    
}
