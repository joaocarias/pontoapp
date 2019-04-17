<?php

namespace App\Controllers;

use Lib\Controller;
use App\Models\Funcionario;
use App\Repositorios\RepositorioFuncionario;
use App\Models\Pessoa;
use App\Repositorios\RepositorioPessoa;
use App\Models\Endereco;
use App\Repositorios\RepositorioEndereco;
use App\Models\Usuario;
use App\Repositorios\RepositorioUsuario;
use App\Repositorios\RepositorioLotacao;
use App\Models\Lotacao;

class FuncionarioController extends Controller {
    public function index($request, $response){
       $controller = 'Funcionario';
       $action = 'index';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function cadastro($request, $response){
       $controller = 'Funcionario';
       $action = 'cadastro';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function detalhes($request, $response){
       $controller = 'Funcionario';
       $action = 'detalhes';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
     public function cadastrar($request, $response){       
        $nome = filter_input(INPUT_POST, "tx_nome", FILTER_SANITIZE_STRING); 
        $apelido = filter_input(INPUT_POST, "tx_apelido", FILTER_SANITIZE_STRING); 
        $genero = filter_input(INPUT_POST, "tx_genero", FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, "tx_cpf", FILTER_SANITIZE_STRING); 
        $pis = filter_input(INPUT_POST, "tx_pis", FILTER_SANITIZE_STRING); 
        $matricula = filter_input(INPUT_POST, "tx_matricula", FILTER_SANITIZE_STRING);
        $data_de_nascimento = filter_input(INPUT_POST, "tx_data_de_nascimento", FILTER_SANITIZE_STRING); 
        $rg = filter_input(INPUT_POST, "tx_rg", FILTER_SANITIZE_STRING); 
                
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
                $objPessoa = new Pessoa($nome, $apelido, $data_de_nascimento, $cpf, $rg, $genero, $retornoEndereco['id'], $_SESSION['id_empresa']); 
                $repositorioPessoa = new RepositorioPessoa();
                $retornoPessoa = $repositorioPessoa->insertPessoa($objPessoa);
                if(!is_null($retornoPessoa) && $retornoPessoa['id'] > 0){
                    $objFuncionario = new Funcionario($retornoPessoa['id'], $pis, $matricula);
                    $repositorioFuncionario = new RepositorioFuncionario();
                    $retornoFuncionario = $repositorioFuncionario->insertFuncionario($objFuncionario);
                                        
                    $objUsuario = new Usuario($retornoPessoa['id'], $cpf, password_hash("123456", PASSWORD_DEFAULT));
                    $repositorioUsuario = new RepositorioUsuario();
                    $retornoUsuario = $repositorioUsuario->insertObj($objUsuario);
                    
                    return $this->response->withHeader('Location', '/lotacao/cadastro?id='.$retornoFuncionario['id']);
                }
            }else{
                return $this->response->withHeader('Location', '/funcionario?r=error');                
            }    
        }else{
            return $this->response->withHeader('Location', '/funcionario?r=error');
        }
    }
    
    public function importacao($request, $response){
        $controller = 'Funcionario';
        $action = 'importacao';
       
        $vars['action'] = $action;
        $vars['controller'] = $controller;      
        $_SESSION['controller'] = $controller;
        $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function exclusao($request, $response){
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
        
        if($id > 0){            
            $repositorio = new RepositorioFuncionario();
            $atual = $repositorio->getFuncionario($id);
            $retorno = $repositorio->excluir($atual);
            
            if($retorno['msg_tipo']=="success"){
                $repositorioPessoa = new RepositorioPessoa();
                $p = $repositorioPessoa->getPessoa($atual->getId_pessoa());
                $retornoPessoa = $repositorioPessoa->excluir($p);
                
                if($retornoPessoa['msg_tipo']=="success"){
                    $repositorioEndereco = new RepositorioEndereco();
                    $endereco = $repositorioEndereco->getEndereco($p->getId_endereco());
                    $retornoEndereco = $repositorioEndereco->excluir($endereco);
                    
                    $repositorioUsuario = new RepositorioUsuario();
                    $usuario = $repositorioUsuario->getObjPorIdPessoa($p->getId_pessoa());
                    $retornoUsuario = $repositorioUsuario->excluir($usuario);
                }
                
                $repositorioLotacao = new RepositorioLotacao();
                $lotacoes = $repositorioLotacao->getLotacaoPorFuncionario($atual->getId());
                foreach ($lotacoes as $item){
                    $retornoLotacao = $repositorioLotacao->excluirLotacao($item);
                }
            }
            return $this->response->withHeader('Location', "/funcionario/index?msg_tipo={$retorno['msg_tipo']}");                
        }else{
            return $this->response->withHeader('Location', "/dashboard");
        }
    }
}
