<?php

namespace Lib;

use App\Strings;

class MenuUserDashboard {
    public function getMenuUser(){
     return '<!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <!--<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>-->
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="/usuario/resetarsenha?id='.$_SESSION['id_usuario'].'"><i class="fa fa-lock fa-lg"></i> Resetar Senha</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Reportar</a></li>
            <li><a class="dropdown-item" href="/login/logout"><i class="fa fa-sign-out fa-lg"></i> Sair</a></li>
          </ul>
        </li>';
    }
}
