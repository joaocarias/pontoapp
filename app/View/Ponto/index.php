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
          </div>
        </div>
      </div>
        
          
        
    </main>



