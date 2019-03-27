<?php

namespace App\Controllers;
use Lib\Controller;

class JornadaDeTrabalhoController extends Controller {
    public function cadastro($request, $response){
       $controller = 'JornadaDeTrabalho';
       $action = 'cadastro';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
}
