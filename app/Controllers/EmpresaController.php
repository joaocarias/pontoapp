<?php

namespace App\Controllers;

use Lib\Controller;
use App\Models\Endereco;
use App\Models\Empresa;
use App\Repositorios\RepositorioEmpresa;
use App\Repositorios\RepositorioEndereco;
use App\Models\Pessoa;
use App\Repositorios\RepositorioPessoa;

class EmpresaController  extends Controller {
    public function index($request, $response){
       $controller = 'Empresa';
       $action = 'index';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function edicao($request, $response, $args = null){
        $controller = 'Empresa';
        $action = 'edicao';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller; 
       $vars['args'] = $args;
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
                    
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
        
    public function cadastro($request, $response){
       $controller = 'Empresa';
       $action = 'cadastro';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    
    public function editar($request, $response){
          $btn_salvar = filter_input(INPUT_POST, "btn_salvar", FILTER_SANITIZE_STRING);
        
        $id_empresa = filter_input(INPUT_POST, "tx_id_empresa", FILTER_SANITIZE_STRING);
        $nome_empresa = filter_input(INPUT_POST, "tx_nome_empresa", FILTER_SANITIZE_STRING); 
        $nome_fantasia = filter_input(INPUT_POST, "tx_nome_fantasia", FILTER_SANITIZE_STRING); 
        $cnpj = filter_input(INPUT_POST, "tx_cnpj", FILTER_SANITIZE_STRING); 
        
        if($btn_salvar && $id_empresa > 0){
            $repositorioEmpresa = new RepositorioEmpresa();
            $objEmpresaAtual = $repositorioEmpresa->getEmpresa($id_empresa);
            $objEmpresaEditada = new Empresa($nome_empresa, $nome_fantasia, $cnpj, $objEmpresaAtual->getId_endereco());
            
            $retornoEdicao = $repositorioEmpresa->updateEmpresa($objEmpresaAtual, $objEmpresaEditada);
            
            $cep = filter_input(INPUT_POST, "tx_cep", FILTER_SANITIZE_STRING); 
            $logradouro = filter_input(INPUT_POST, "tx_logradouro", FILTER_SANITIZE_STRING); 
            $numero = filter_input(INPUT_POST, "tx_numero", FILTER_SANITIZE_STRING); 
            $complemento = filter_input(INPUT_POST, "tx_complemento", FILTER_SANITIZE_STRING); 
            $bairro = filter_input(INPUT_POST, "tx_bairro", FILTER_SANITIZE_STRING); 
            $cidade = filter_input(INPUT_POST, "tx_cidade", FILTER_SANITIZE_STRING); 
            $uf = filter_input(INPUT_POST, "sel_uf", FILTER_SANITIZE_STRING); 
            $telefone = filter_input(INPUT_POST, "tx_telefone", FILTER_SANITIZE_STRING); 
            $celular = filter_input(INPUT_POST, "tx_celular", FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, "tx_email", FILTER_SANITIZE_STRING);
        
            $repositorioEndereco = new RepositorioEndereco();            
            $objEnderecoAtual = $repositorioEndereco->getEndereco($objEmpresaAtual->getId_endereco());
            $objEnderecoEditado = new Endereco($logradouro, $numero, $complemento, $cep, $bairro, $cidade, $uf, $telefone, $celular, $email);
            
            $retornoEdicaoEndereco = $repositorioEndereco->updateObj($objEnderecoAtual, $objEnderecoEditado);
                       
                return $this->response->withHeader('Location', '/empresa');
                
        }else{
            return $this->response->withHeader('Location', '/empresa?r=error');                
        }  
                    
    }
    
    public function cadastrar($request, $response){       
        $nome_empresa = filter_input(INPUT_POST, "tx_nome_empresa", FILTER_SANITIZE_STRING); 
        $nome_fantasia = filter_input(INPUT_POST, "tx_nome_fantasia", FILTER_SANITIZE_STRING); 
        $cnpj = filter_input(INPUT_POST, "tx_cnpj", FILTER_SANITIZE_STRING); 
        $cep = filter_input(INPUT_POST, "tx_cep", FILTER_SANITIZE_STRING); 
        $logradouro = filter_input(INPUT_POST, "tx_logradouro", FILTER_SANITIZE_STRING); 
        $numero = filter_input(INPUT_POST, "tx_numero", FILTER_SANITIZE_STRING); 
        $complemento = filter_input(INPUT_POST, "tx_complemento", FILTER_SANITIZE_STRING); 
        $bairro = filter_input(INPUT_POST, "tx_bairro", FILTER_SANITIZE_STRING); 
        $cidade = filter_input(INPUT_POST, "tx_cidade", FILTER_SANITIZE_STRING); 
        $uf = filter_input(INPUT_POST, "sel_uf", FILTER_SANITIZE_STRING); 
        $telefone = filter_input(INPUT_POST, "tx_telefone", FILTER_SANITIZE_STRING); 
        $celular = filter_input(INPUT_POST, "tx_celular", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "tx_email", FILTER_SANITIZE_STRING);
        
        $btn_salvar = filter_input(INPUT_POST, "btn_salvar", FILTER_SANITIZE_STRING);
        
        if($btn_salvar){
            $objEndereco = new Endereco($logradouro, $numero, $complemento, $cep, $bairro, $cidade, $uf
                    , $telefone, $celular, $email);
            $repositorioEndereco = new RepositorioEndereco();
            $retornoEndereco = $repositorioEndereco->insertObj($objEndereco);
                    
            if(!is_null($retornoEndereco) && $retornoEndereco['id'] > 0){
                $objEmpresa = new Empresa($nome_empresa, $nome_fantasia, $cnpj, $retornoEndereco['id']);
                $repositorioEndereco = new RepositorioEmpresa();
                $retornoEmpresa = $repositorioEndereco->insertEmpresa($objEmpresa);
                if(!is_null($retornoEmpresa) && $retornoEmpresa['id'] > 0){
                    $objPessoa = new Pessoa();
                    $repositorioPessoa = new RepositorioPessoa();
                    $retornoPessoa = $repositorioPessoa->setEmpresa($_SESSION['id_pessoa'], $retornoEmpresa['id']);
                    
                    return $this->response->withHeader('Location', '/login?r='.$retornoEmpresa['id']);
                }
            }else{
                return $this->response->withHeader('Location', '/login?r=error');                
            }    
        }else{
            return $this->response->withHeader('Location', '/login?r=error');
        }
    }
    
    
}
