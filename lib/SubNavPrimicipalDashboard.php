<?php

namespace Lib;
use App\Strings;

class SubNavPrimicipalDashboard {
    public function getSubNav(){
        $strings = new Strings();
        $stringsArr = $strings->getStrings();
        
         $controller = $_SESSION["controller"];
                $action = "";
                $separador = "";
                
                if(isset($_SESSION['action']) and !is_null($_SESSION['action']) and $_SESSION['action'] != "index"){
                    $action = $_SESSION['action'];
                    $separador = "/";
                }
         
        return '<div class="app-title">
            <div>
                <h1><i class="'.$stringsArr[strtolower($_SESSION['controller'])]->getIcon().'"></i> '.ucfirst($stringsArr[strtolower($_SESSION['controller'])]->getTexto()).'</h1>              
            </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>'
                . '<li class="breadcrumb-item">'
                 . '<a href="/'. strtolower($controller.$separador.$action) .'">'. ucfirst($controller) . " " .$separador. " " .ucfirst($action) .'</a>'
                 . '</li>
        </ul>
      </div>';
                  
    }
}
