<?php

namespace App\Controllers;

use Lib\Controller;
use App\Models\Lotacao;
use App\Repositorios\RepositorioLotacao;
use App\Models\LotacaoRegistraPonto;
use App\Repositorios\RepositorioLotacaoRegistraPonto;

class LotacaoController extends Controller{
    public function index($request, $response){
       $controller = 'Lotacao';
       $action = 'index';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function cadastro($request, $response){
       $controller = 'Lotacao';
       $action = 'cadastro';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function edicao($request, $response, $args = null){
       $controller = 'Lotacao';
       $action = 'edicao';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;  
       $vars['args'] = $args;       
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function cadastrar($request, $response){       
        $id_funcao = filter_input(INPUT_POST, "tx_id_funcao", FILTER_SANITIZE_STRING);
        $id_unidade = filter_input(INPUT_POST, "tx_id_unidade", FILTER_SANITIZE_STRING);
        $dt_inicio_lotacao = filter_input(INPUT_POST, "tx_inicio_lotacao", FILTER_SANITIZE_STRING);
        $id_funcionario = filter_input(INPUT_POST, "tx_id_funcionario", FILTER_SANITIZE_STRING);
        
        $btn_salvar = filter_input(INPUT_POST, "btn_salvar", FILTER_SANITIZE_STRING);
        
        if($btn_salvar){
            $obj = new Lotacao($id_funcionario, $id_unidade, $id_funcao, $dt_inicio_lotacao);
            $repositorio = new RepositorioLotacao();
            $retorno = $repositorio->insertLotacao($obj);
            
            if(!is_null($retorno) && $retorno > 0){
                $objLotacaoRegistraPonto = new LotacaoRegistraPonto($retorno['id'], "SIM");
                $repositorioLotacaoRegistraPonto = new RepositorioLotacaoRegistraPonto();
                $ret1 = $repositorioLotacaoRegistraPonto->insertObj($objLotacaoRegistraPonto);
                return $this->response->withHeader('Location', '/jornadadetrabalho/cadastro?id='.$id_funcionario.'&id_lotacao='.$retorno['id']);                
            }else{
                return $this->response->withHeader('Location', '/funcionario/detalhes?id='.$id_funcionario.'&r=error');                
            }    
        }else{
            return $this->response->withHeader('Location', '/funcionario/detalhes?id='.$id_funcionario.'&r=error');
        }
    }
    
    public function editar($request, $response, $args = null){
//        $btn_salvar = filter_input(INPUT_POST, "btn_salvar", FILTER_SANITIZE_STRING);
//        
//        $id = filter_input(INPUT_POST, "tx_id_funcao", FILTER_SANITIZE_STRING);
//        $nome = filter_input(INPUT_POST, "tx_nome_funcao", FILTER_SANITIZE_STRING);
//        
//        if($btn_salvar && $id > 0)
//        {
//            $repositorio = new RepositorioFuncao();
//            $atual = $repositorio->getObj($id);
//            $retorno = $repositorio->updateFuncao($atual, new Funcao($nome));
//            return $this->response->withHeader('Location', "/funcao/index?id={$atual->getId_funcao()}");                
//        }else{
//            return $this->response->withHeader('Location', "/dashboard");
//        }
    }
    
    public function excluir($request, $response, $args = null){        
//        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
//        
//        if($id > 0)
//        {
//            $repositorio = new RepositorioFuncao();
//            $atual = $repositorio->getObj($id);
//            $retorno = $repositorio->ExcluirFuncao($atual);
//            return $this->response->withHeader('Location', "/funcao/index?id={$atual->getId_funcao()}");                
//        }else{
//            return $this->response->withHeader('Location', "/dashboard");
//        }
    }
}
