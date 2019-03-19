<?php

 use Lib\SubNavPrimicipalDashboard;
 use Lib\Form;
 
    $subNav = new SubNavPrimicipalDashboard();
    $_nome = "";        
    
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
              <a href="/funcionario/cadastro"><button class="btn btn-primary">Cadastar</button></a>         
              <a href="/funcionario/importar"><button class="btn btn-info">Importar</button></a>
          </div>
           
       </div>
      </div>
      
     
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
              <div class="page-header">
              <h2 class="mb-3 line-head" id="containers">Buscar</h2>
            </div>
              <?php 
                  echo Form::beginForm('get', '/funcionario/index')
                          .Form::getInput('text', "tx_buscar", "Nome", "", "col-md-6", TRUE, $_nome)                          
                          .'<div class="col col-md-6"></div>'
                          .Form::getInputButtonSubmit("buscar", "buscar", "btn-success btn-sm")                        
                  .Form::endForm(); 
              ?>              
        
          </div>
        </div>
      </div>
      
          
    </main>