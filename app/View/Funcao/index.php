<?php

 use Lib\SubNavPrimicipalDashboard;
 use App\Repositorios\RepositorioFuncao;
 
    $subNav = new SubNavPrimicipalDashboard();
            
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
              <a href="/funcao/cadastro"><button class="btn btn-primary">Cadastar</button></a>
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
              
                $repositorio = new RepositorioFuncao();
                $funcoes = $repositorio->getFuncoes();
              
                $linhas = "";
                foreach ($funcoes as $obj){
                    $linhas = $linhas . "
                        <tr>
                            <th scope='row'>{$obj->id_funcao}</th>
                            <td>{$obj->nome}</td>
                            <td><a href='/funcao/edicao?id={$obj->id_funcao}'>Editar</a></td>
                            <td><a href='/funcao/excluir?id={$obj->id_funcao}'>Excluir</a></td>
                        </tr>";
                }
                
              ?>
              <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Função</th>
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



