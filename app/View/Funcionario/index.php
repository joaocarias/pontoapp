<?php

 use Lib\SubNavPrimicipalDashboard;
 use Lib\Form;
 use App\Models\Funcionario;
 use App\Repositorios\RepositorioFuncionario;
 
    $subNav = new SubNavPrimicipalDashboard();
    
    $_buscar = filter_input(INPUT_GET, "tx_buscar", FILTER_SANITIZE_STRING);
    
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
                          .Form::getInput('text', "tx_buscar", "Nome, CPF ou PIS", "Informe Nome, CPF ou PIS", "col-md-6", TRUE, $_buscar)                          
                          .'<div class="col col-md-6"></div>'
                          .Form::getInputButtonSubmit("buscar", "buscar", "btn-success btn-sm")                        
                  .Form::endForm(); 
              ?>    
          </div>
        </div>
      </div>
      
    <?php
        if($_buscar){
            
            $repositorio = new RepositorioFuncionario();
            $array = $repositorio->getFuncionarioPorNomeCPFPIS($_buscar);
            
            $linhas = "";
            
            foreach ($array as $obj){
                    $linhas = $linhas . "
                        <tr>
                            <th scope='row'>{$obj->id_funcionario}</th>
                            <td>".$obj->nome ."</td>
                            <td>{$obj->cpf}</td>
                            <td>{$obj->pis}</td>
                            <td><a href='/funcionario/detalhes?id={$obj->id_funcionario}'>Mais Informações</a></td>
                        </tr>";
                }
            
            echo '<!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
              <div class="page-header">
              <h2 class="mb-3 line-head" id="containers">Resultado</h2>
            </div>
            
            <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">CPF</th>
                      <th>PIS</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    '.$linhas.'                   
                  </tbody>
            </table>

          </div>
        </div>
      </div>';
        }
            
    ?>      
          
    </main>