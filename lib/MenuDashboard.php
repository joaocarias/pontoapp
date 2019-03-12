<?php

namespace Lib;

use App\Strings;
use App\Models\ItemString;

class MenuDashboard {
    private function getItem(ItemString $item, $subItens = null){
       
        $classActive = ($_SESSION['controller'] == $item->controller)
                    ? 'active' : '';
        
        return '<li>
                    <a class="app-menu__item '. $classActive.'" href="/'.$item->getLink().'">
                        <i class="app-menu__icon fa '.$item->getIcon().' "></i>
                        <span class="app-menu__label">'.ucfirst($item->getTexto()).'</span>
                        </a>
                </li>
            ';
    }
    
    public function getMenu(){
        
        $stringsObj = new Strings();
        $stringsArr = $stringsObj->getStrings();

        return '<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
          <!--<img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">-->
        <div>
            <p class="app-sidebar__user-name">'. $_SESSION['nome_pessoa'] .'</p>
          <p class="app-sidebar__user-designation">'. $_SESSION['cpf_pessoa'] .'</p>
        </div>
      </div>
      <ul class="app-menu">
            
        '.$this->getItem($stringsArr['dashboard']).'
        '.$this->getItem($stringsArr['unidade']).'
        '.$this->getItem($stringsArr['empresa']).'
       
        
      </ul>
    </aside>';        
    }
}
