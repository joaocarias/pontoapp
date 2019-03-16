<?php

namespace App\Controllers;
use Lib\Controller;

class PDNController extends Controller  {
    public function index($request, $response){
       $controller = 'PDN';
       $action = 'index';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
}
