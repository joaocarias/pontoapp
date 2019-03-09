<?php

namespace App\Controllers;

use Lib\Controller;
use App\Repositorios\RepositorioLogAcesso;
use App\Repositorios\RepositorioPessoa;
use App\Repositorios\RepositorioUsuario;
use App\Models\LogAcesso;
/**
 * Description of LoginController
 *
 * @author branc
 */
class LoginController extends Controller {
    public function login($request, $response){
        session_destroy();
        $vars['action'] = 'login';
        $vars['controller'] = 'Login';        
        return $this->view->render($response, 'layout_login.php', $vars);
    }
    
    public function logar($request, $response){
        $btnAcessar = filter_input(INPUT_POST, 'btnAcessar', FILTER_SANITIZE_STRING);
        $loginInput = filter_input(INPUT_POST, 'loginInput', FILTER_SANITIZE_STRING);
        $senhaInput = filter_input(INPUT_POST, 'senhaInput', FILTER_SANITIZE_STRING);
        
        if($btnAcessar){
            $repUsuario = new RepositorioUsuario(); 
            $objUsuario = $repUsuario->getObjPorLogin($loginInput);
            
            if($objUsuario != null AND $objUsuario->getId_usuario() > 0 AND $objUsuario->getId_pessoa() > 0){
                $repPessoa = new RepositorioPessoa();
                $objPessoa = $repPessoa->getPessoa($objUsuario->getId_pessoa());
                
                $_SESSION['id_usuario'] = $objUsuario->getId_usuario();
                $_SESSION['id_pessoa'] = $objUsuario->getId_pessoa();
                $_SESSION['login'] = $objUsuario->getLogin();
                $_SESSION['cpf_pessoa'] = $objPessoa->getCpf();
                $_SESSION['nome_pessoa'] = $objPessoa->getNome();
                $_SESSION['logado'] = '1';
                $_SESSION['id_empresa'] = $objPessoa->getId_empresa();
            
                $retorno = $this->registrarLogin("PERMITIDO", $loginInput, $_SESSION['id_usuario']);
                if(is_null($objPessoa->getId_empresa()) OR ($objPessoa->getId_empresa() < 0 ) OR ($objPessoa->getId_empresa() == "")){                   
                    return $this->response->withHeader('Location', '/empresa/cadastro');
                }else{                   
                    return $this->response->withHeader('Location', '/dashboard');    
                }
            }else{
                $retorno = $this->registrarLogin("NEGADO", $loginInput);
                return $this->response->withHeader('Location', '/login?msg=0');
            }            
        }else{
            $retorno = $this->registrarLogin("NEGADO", $loginInput);
            return $this->response->withHeader('Location', '/login?msg=2');
        }        
    }
    
    public function logout($request, $response){
        session_destroy();
        return $this->response->withHeader('Location', '/login');
    }
}
