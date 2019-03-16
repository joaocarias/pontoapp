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
              
                $linhas = "";
//                var_dump($unidades);
                foreach ($unidades as $obj){
                    $linhas = $linhas . "
                        <tr>
                            <th scope='row'>{$obj->id_unidade}</th>
                            <td>{$obj->nome}</td>
                            <td><a href='/unidade/edicao?id={$obj->id_unidade}'>Editar</a></td>
                            <td><a href='/unidade/excluir?id={$obj->id_unidade}'>Excluir</a></td>
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
                    <?=$linhas?>                   
                  </tbody>
                </table>
          
          </div>
          
        </div>
      </div>
    </main>



