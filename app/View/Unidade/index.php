<?php

 use Lib\SubNavPrimicipalDashboard;
 use App\Repositorios\RepositorioUnidade;
 
    $subNav = new SubNavPrimicipalDashboard();
            
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
              <a href="/unidade/cadastro"><button class="btn btn-primary">Cadastar</button></a>
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
              
                $repositorioUnidade = new RepositorioUnidade();
                $unidades = $repositorioUnidade->getUnidades();
              
                $linhasLotacoes = "";
//                var_dump($unidades);
                foreach ($unidades as $obj){
                    $linhasLotacoes = $linhasLotacoes . "
                        <tr>
                            <th scope='row'>{$obj->getId_unidade()}</th>
                            <td>{$obj->getNome()}</td>
                            <td><a href='/unidade/edicao?id={$obj->getId_unidade()}'>Editar</a></td>
                            <td><a href='/unidade/excluir?id={$obj->getId_unidade()}'>Excluir</a></td>
                        </tr>";
                }
                
              ?>
              <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Unidade</th>
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



