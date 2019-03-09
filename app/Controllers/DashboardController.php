<?php

namespace App\Controllers;

use Lib\Controller;

class DashboardController extends Controller {
    public function index($request, $response){
       
        if($this->validarAcesso()){
            if($this->validarEmpresa()){
                $controller = 'Dashboard';
                $action = 'index';
            }else{
                return $this->response->withHeader('Location', '/empresa/cadastro');
            }
        }else{
            return $this->response->withHeader('Location', '/login?msg=3');
        }
        
        $vars['action'] = $action;
        $vars['controller'] = $controller;      
        $_SESSION['controller'] = $controller;
        $_SESSION['action'] = $action;
        
        return $this->view->render($response, 'layout_dashboard.php', $vars);
       
    }
}
