<?php

 use Lib\SubNavPrimicipalDashboard;
 use App\Repositorios\RepositorioPDN;
 
    $subNav = new SubNavPrimicipalDashboard();
            
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
                
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
                <h2 class="mb-3 line-head" id="containers">Lista</h2>
            </div>
          </div>
        </div>       
                          
      <div class="row">
          <div class="col-lg-12">
            
              <?php
              
                $repositorio = new RepositorioPDN();
                $pdns = $repositorio->getPDNs();
              
                $linhasLotacoes = "";

                foreach ($pdns as $obj){
                    $linhasLotacoes = $linhasLotacoes . "
                        <tr>
                            <th scope='row'>{$obj->id}</th>
                            <td>{$obj->codigo}</td>
                            <td>{$obj->descricao}</td>
                            <td></td>                            
                        </tr>";
                }                
              ?>
              <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Código</th>
                      <th>Descrição</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?=$linhasLotacoes?>                   
                  </tbody>
                </table>
          
          </div>
          
        </div>
      </div>
    </main>



