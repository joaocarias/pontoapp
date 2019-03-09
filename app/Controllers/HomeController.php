<?php

namespace App\Controllers;

use Lib\Controller;

/**
 * Description of HomeController
 *
 * @author joão carias de frança
 */
class HomeController extends Controller{
    public function index($request, $response){
        $vars['action'] = 'home';
        $vars['controller'] = 'Home';        
        return $this->view->render($response, 'layout_home.php', $vars);
    }
    
    public function sobre($request, $response){
        $vars['action'] = 'sobre';  
        $vars['controller'] = 'Home';
        return $this->view->render($response, 'layout_home.php', $vars);
    }
    
    public function contato($request, $response){
        $vars['action'] = 'contato';
        $vars['controller'] = 'Home';        
        return $this->view->render($response, 'layout_home.php', $vars);
    }
}
