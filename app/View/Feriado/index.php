<?php

 use Lib\SubNavPrimicipalDashboard;
 use App\Repositorios\RepositorioFeriado;
 use Lib\Form;
 use Lib\Auxiliar;
 
    $subNav = new SubNavPrimicipalDashboard();
            
    $tx_de = filter_input(INPUT_GET, "tx_de", FILTER_SANITIZE_STRING); 
    $tx_ate = filter_input(INPUT_GET, "tx_ate", FILTER_SANITIZE_STRING);    
    
    $_de = $tx_de ? $tx_de : date('Y') . "-01-01";
    $_ate = $tx_ate ? $tx_ate : date('Y') . "-12-31";
    
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
        <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
             <a href="/feriado/cadastro"><button class="btn btn-primary btn-sm">Cadastar</button></a>
          </div>
        </div>
      </div>
        
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
              <?php 
                  echo Form::beginForm('get', '/feriado/index')
                          .Form::getInput('date', "tx_de", "De", "", "col-md-4", TRUE, $_de)
                          .Form::getInput('date', "tx_ate", "Até", "", "col-md-4", TRUE, $_ate)
                          .'<div class="col col-md-4"></div>'
                          .Form::getInputButtonSubmit("buscar", "buscar", "btn-success btn-sm")
                        
                  .Form::endForm(); 
              ?>              
        
          </div>
        </div>
      </div>
        
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
              
                $repositorio = new RepositorioFeriado();
                $feriados = $repositorio->getFeriados($_de, $_ate);
              
                $linhasLotacoes = "";

                foreach ($feriados as $obj){
                    $linhasLotacoes = $linhasLotacoes . "
                        <tr>
                            <th scope='row'>{$obj->id_feriado}</th>
                            <td>".Auxiliar::converterDataParaBR($obj->dt_feriado) ."</td>
                            <td>{$obj->nome}</td>
                            <td><a href='/feriado/edicao?id={$obj->id_feriado}'>Editar</a></td>
                            <td><a href='/feriado/excluir?id={$obj->id_feriado}'>Excluir</a></td>
                        </tr>";
                }
                
              ?>
              <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Data do Feriado</th>
                      <th scope="col">Feriado</th>
                      <th></th>
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

