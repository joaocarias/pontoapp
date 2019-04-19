<?php

 use Lib\SubNavPrimicipalDashboard;
  
    $subNav = new SubNavPrimicipalDashboard();
            
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
              <a class="btn btn-info" href="/ponto/exportacao">
                 <i class="fas fa-file-download"></i> Exportar Ponto</a>
              <a class="btn btn-success" href="/ponto/importacao">
                 <i class="fas fa-file-upload"></i> Importar Registros de Ponto</a>
          </div>
        </div>
      </div>
        
          
        
    </main>



