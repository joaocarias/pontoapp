<?php

namespace App\Controllers;

use App\Models\Justificativa;
use App\Repositorios\RepositorioFuncionario;
use App\Repositorios\RepositorioJustificativa;
use Lib\Controller;
use App\Models\Funcao;
use App\Repositorios\RepositorioFuncao;

class JustificativaController extends Controller{
    
    public function edicao($request, $response, $args = null){
       $controller = 'Justificativa';
       $action = 'edicao';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;  
       $vars['args'] = $args;       
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function cadastrar($request, $response){       
        $data = filter_input(INPUT_POST, "data", FILTER_SANITIZE_STRING);
        $hrs_justificadas = filter_input(INPUT_POST, "hrs_justificadas", FILTER_SANITIZE_STRING);
        $txt_justificativa = filter_input(INPUT_POST, "txt_justificativa", FILTER_SANITIZE_STRING);
        $btn_salvar = filter_input(INPUT_POST, "btn_salvar", FILTER_SANITIZE_STRING);

        $RepFuncionario = new RepositorioFuncionario();
        $id_funcionario = $RepFuncionario->getFuncionarioPorIdPessoa($_SESSION['id_pessoa'])->getId();

        $hrs_justificadas_ = explode(":", $hrs_justificadas);
        $hrs_justificadas = $hrs_justificadas_[0]*60 + $hrs_justificadas_[1];
        
        if($btn_salvar){
            $obj = new Justificativa($id_funcionario, $data, $hrs_justificadas, $txt_justificativa);
            $repositorio = new RepositorioJustificativa();
            $retorno = $repositorio->insertJustificativa($obj);
            
            if(!is_null($retorno) && $retorno > 0){
                return $this->response->withHeader('Location', '/calendario/index?r='.$retorno['id']);
            }else{
                return $this->response->withHeader('Location', '/calendario/index?r=error');
            }    
        }else{
            return $this->response->withHeader('Location', '/calendario/index?r=error');
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
