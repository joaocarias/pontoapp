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
                        <i class="app-menu__icon '.$item->getIcon().' "></i>
                        <span class="app-menu__label">'.ucfirst($item->getTexto()).'</span>
                        </a>
                </li>
            ';
    }
    
    public function getMenu(){
        
        $stringsObj = new Strings();
        $stringsArr = $stringsObj->getStrings();

        $nome = explode(" ", $_SESSION['nome_pessoa']);

        return '<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"  style="text-align: center">
          <!--<img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">-->
        <div>
            <p class="app-sidebar__user-name">'. $nome[0]." ".$nome[1] .'</p>
          <p class="app-sidebar__user-designation">'. $_SESSION['cpf_pessoa'] .'</p>
        </div>
      </div>
      <ul class="app-menu">
            
        '.$this->getItem($stringsArr['dashboard']).'
        '.$this->getItem($stringsArr['funcionario']).'
        '.$this->getItem($stringsArr['ponto']).'
        '.$this->getItem($stringsArr['calendario']).'
        '.$this->getItem($stringsArr['unidade']).'
        '.$this->getItem($stringsArr['funcao']).'
        '.$this->getItem($stringsArr['feriado']).'
        '.$this->getItem($stringsArr['pdn']).'
        '.$this->getItem($stringsArr['empresa']).'
       
        
      </ul>
    </aside>';        
    }
}
