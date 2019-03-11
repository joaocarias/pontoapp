<?php

namespace App\Controllers;
use Lib\Controller;
use App\Repositorios\RepositorioUsuario;

class UsuarioController extends Controller {
    public function resetarSenha($request, $response, $args = null){
       $controller = 'Usuario';
       $action = 'resetarSenha';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;    
       $vars['args'] = $args;
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }    
    
    public function atualizarSenha($request, $response, $args = null){
        $btn_salvar = filter_input(INPUT_POST, "btn_salvar", FILTER_SANITIZE_STRING);
        
        $id_usuario = filter_input(INPUT_POST, "tx_id_usuario", FILTER_SANITIZE_STRING);
        $novaSenha = filter_input(INPUT_POST, "tx_nova_senha", FILTER_SANITIZE_STRING);
        
        if($btn_salvar && $id_usuario > 0)
        {
            $repositorioUsuario = new RepositorioUsuario();
            $usuario = $repositorioUsuario->getObj($id_usuario);
            $retorno = $repositorioUsuario->atulizarSenha($usuario, password_hash($novaSenha, PASSWORD_DEFAULT));
            return $this->response->withHeader('Location', "/usuario/resetarsenha?id={$id_usuario}?msg={$retorno['msg_tipo']}");                
        }
    }
}
