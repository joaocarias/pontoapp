
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
    
    $_de = filter_input(INPUT_GET, "tx_de", FILTER_SANITIZE_STRING) ;    
    $_ate = filter_input(INPUT_GET, "tx_ate", FILTER_SANITIZE_STRING);
    $_id_competencia = filter_input(INPUT_GET, "tx_id_competencia", FILTER_SANITIZE_STRING);  
    
    $msg_tipo = filter_input(INPUT_GET, "msg_tipo", FILTER_SANITIZE_STRING);
    $msg = filter_input(INPUT_GET, "msg", FILTER_SANITIZE_STRING);
    
    $repositorioCompetencia = new RepositorioCompetencia();
    
    $mes_atual = date('m');
    $ano_atual = date('Y');
    $dia_atual = date('d');
    
    $_mes_competencia = $mes_atual;
    $_ano_competencia = $ano_atual;
    
    if(!$_de){
        $_de = "{$ano_atual}-01-01";    
    }
    if(!$_ate){        
        $_ate = "{$ano_atual}-{$mes_atual}-{$dia_atual}";
    }
    
    $competencia = new Competencia();
    if($_id_competencia){        
        $competencia = $repositorioCompetencia->getObj($_id_competencia);
        if(isset($competencia) and !is_null($competencia) and $competencia->getId() > 0){
            $_mes_competencia =  str_pad($competencia->getMes() , 2 , '0' , STR_PAD_LEFT);
            $_ano_competencia = $competencia->getAno();
        }else{
            $_ano_competencia = $ano_atual;
            $_mes_competencia = $mes_atual;
            
        }
    }else{    
        $competencia = $repositorioCompetencia->getObjMesAno($mes_atual, $ano_atual);
    }
    
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
              <a class="btn btn-light" href="/ponto">
                 <i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
          </div>
        </div>
      </div>       
      
            
       <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
                <h2 class="mb-3 line-head" id="containers">Importar Registro de Ponto</h2>
            </div>
          </div>
        </div>       
                          
      <div class="row">
          <div class="col-lg-12">
              <div class="card mb-3">
                  <div class="card-body border-success">
                      <p class="text-danger">Informe um período para realizar a importação na antiga base de dados</p>
                     <?php 
                     
                        echo Form::beginForm('get', '/ponto/importar')
                          .Form::getInput('date', "tx_de", "De", "", "col-md-4", TRUE, $_de)
                          .Form::getInput('date', "tx_ate", "Até", "", "col-md-4", TRUE, $_ate)  
                          ."<div class='col-md-4'></div>"
                          .Form::getInputButtonSubmit("buscar", "Realizar a Importação", "btn-success btn-sm")
                        
                  .Form::endForm(); 
                
                      if($msg_tipo == "success"){
                   
                          ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Número de Atulizações: <?=$msg?> .
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <?php 
                      }
                      ?>
                  </div>
              </div>
          </div>
          
          
         </div>
             
          </div>
          
        
    </main>
