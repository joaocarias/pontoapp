
<?php

use App\Repositorios\RepositorioFuncao;
use App\Repositorios\RepositorioFuncionario;
use App\Repositorios\RepositorioLotacao;
use App\Repositorios\RepositorioPessoa;
use App\Repositorios\RepositorioUnidade;
use Lib\SubNavPrimicipalDashboard;
use App\Models\TipoJornadaDeTrabalho;
use App\Models\JornadaDeTrabalho;
use App\Repositorios\RepositorioLotacaoJornadaDeTrabalho;
use App\Models\LotacaoJornadaDeTrabalho;
use App\Repositorios\RepositorioJornadaDeTrabalho;
use App\Repositorios\RepositorioTipoJornadaDeTrabalho;
use Lib\Form;
use App\Repositorios\RepositorioCompetencia;
use App\Models\Competencia;
 
    $subNav = new SubNavPrimicipalDashboard();
    
    $dia = filter_input(INPUT_GET, "dia", FILTER_SANITIZE_STRING);
    $mes = filter_input(INPUT_GET, "mes", FILTER_SANITIZE_STRING);
    $ano = filter_input(INPUT_GET, "ano", FILTER_SANITIZE_STRING);
    
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
              <a class="btn btn-light" href="/calendario">
                 <i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
          </div>
        </div>
      </div>       
      
            
       <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
                <h2 class="mb-3 line-head" id="containers">Realizar Justificativa</h2>
            </div>
          </div>
        </div>       
                          
      <div class="row">
          <div class="col-lg-12">
              <div class="card mb-3">
                  <div class="card-body border-success">
                      <p class="text-danger">Preencha os campos para sua justificativa do dia <strong><?=$dia.'/'.$mes.'/'.$ano ?></strong></p>
                     <?php 
                     
                        echo Form::beginForm('post', '/justificativa/insertJustificativa')
                          .Form::getHidden('data', $ano.'-'.$mes.'-'.$dia)
                          .Form::getInput('text', "hrs_justificadas", "Hrs Justificadas", "", "col-md-2", TRUE, "", FALSE, "99:99")
                            ."<div class='col-md-10'></div>"
                            .Form::getTxtArea('txt_justificativa', "Texto de Justificativa", "", "col_md_8", TRUE, "",FALSE, 5)
                          ."<div class='col-md-5'></div>"
                          .Form::getInputButtonSubmit("buscar", "Realizar a Importação", "btn-success btn-sm")
                        
                  .Form::endForm(); 
                
                      
                      ?>
                  </div>
              </div>
          </div>
          
          
         </div>
             
          </div>
          
        
    </main>
