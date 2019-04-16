
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
    
    $repositorioCompetencia = new RepositorioCompetencia();
    
    $mes_atual = date('m');
    $ano_atual = date('Y');
    
    $_mes_competencia = $mes_atual;
    $_ano_competencia = $ano_atual;
    
    if(!$_de){
        $_de = "2019-03-15";    
    }
    if(!$_ate){
        $_ate = "2019-04-14";
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
                <h2 class="mb-3 line-head" id="containers">Exportar Ponto</h2>
            </div>
          </div>
        </div>       
                          
      <div class="row">
          <div class="col-lg-12">
              <div class="card mb-3">
                  <div class="card-body border-success">
                      
                     <?php 
                     
                        echo Form::beginForm('get', '/ponto/exportacao')
                          .Form::getInput('date', "tx_de", "De", "", "col-md-4", TRUE, $_de)
                          .Form::getInput('date', "tx_ate", "Até", "", "col-md-4", TRUE, $_ate)                          
                          .Form::getSelect($repositorioCompetencia->getArrayBasic(), "tx_id_competencia", "Competência (Mês/Ano)", "col-md-4", true, $competencia->getId())
                          .Form::getInputButtonSubmit("buscar", "Selecionar", "btn-success btn-sm")
                        
                  .Form::endForm(); 
              ?>      
                  </div>
              </div>
          </div>
          
          <div class="col-lg-12">
         <div class="card" >
                  <div class="card-body border-success">
                      <div class="h3 text-center">Competência: <?="{$_mes_competencia}/{$competencia->getAno()}"?></div>
              <?php
              
                $repositorioUnidade = new RepositorioUnidade();
                $unidades = $repositorioUnidade->getUnidades();
              
                foreach($unidades as $obj){
                    echo  strtoupper("<center><strong>{$obj->getId_unidade()} - {$obj->getNome()}</strong></center><br />");
                    
                    $repositorioLotacao = new RepositorioLotacao();
                    $lotacoes = $repositorioLotacao->getLotacaoPorUnidade($obj->getId_unidade());
                    
                    $linhasValido = "";
                    $contValido = 0;
                    $linhasInvalido = "";
                    $contInvalido = 0;
                    foreach ($lotacoes as $lotacao){
                        $repositorioFuncionario = new RepositorioFuncionario();
                        $funcionario = $repositorioFuncionario->getFuncionario($lotacao->getId_funcionario());
                        
                        $repositorioPessoa = new RepositorioPessoa();
                        $pessoa = $repositorioPessoa->getPessoa($funcionario->getId_pessoa());
                        
                        $repositorioFuncao = new RepositorioFuncao();
                        $funcao = $repositorioFuncao->getObj($lotacao->getId_funcao());
                        
                        $repositorioLotacaoJornadaDeTrabalho = new RepositorioLotacaoJornadaDeTrabalho();
                        $lotacaoJornadaDeTrabalho = $repositorioLotacaoJornadaDeTrabalho->getObjPorIdLotacao($lotacao->getId());
                     
                        $repositorioJornadaDeTrabalho = new RepositorioJornadaDeTrabalho();
                        $jornadaDeTrabalho = $repositorioJornadaDeTrabalho->getObj($lotacaoJornadaDeTrabalho->getId_jornada_de_trabalho());
                        
                        $repositorioTipoJornadaDeTrabalho = new RepositorioTipoJornadaDeTrabalho();
                        $tipoJornadaDeTrabalho = $repositorioTipoJornadaDeTrabalho->getObj($jornadaDeTrabalho->getId_tipo_jornada_de_trabalho());
                        
                        if(!is_null($funcionario) && !is_null($funcionario->getMatricula()) && $funcionario->getMatricula() > 0 && $funcionario->getMatricula() <= 99999999 ){
                             $linhasValido = $linhasValido 
                                . '<tr>'
                                    . '<td>'.$funcionario->getMatricula().'</td>'
                                    . '<td>'.$pessoa->getNome().'</td>'
                                    . '<td>'.$pessoa->getCpf().'</td>'
                                    . '<td>'.$funcionario->getPis().'</td>'
                                    . '<td>'.$funcao->getNome().'</td>'
                                    . '<td>'.$tipoJornadaDeTrabalho->getNome().'</td>'
                                    . '<td>'.($repositorioJornadaDeTrabalho->getCargaPeriodo($jornadaDeTrabalho->getId()))/60 .' Horas</td>'                                    
                                . '</tr>';
                             $contValido++;
                        }else{
                            $linhasInvalido = $linhasInvalido 
                                . '<tr class="text-warning">'
                                    . '<td>'.$funcionario->getMatricula().'</td>'
                                    . '<td>'.$pessoa->getNome().'</td>'
                                    . '<td>'.$pessoa->getCpf().'</td>'
                                    . '<td>'.$funcionario->getPis().'</td>'
                                    . '<td>'.$funcao->getNome().'</td>'
                                    . '<td>'.$tipoJornadaDeTrabalho->getNome().'</td>'
                                     . '<td>'.($repositorioJornadaDeTrabalho->getCargaPeriodo($jornadaDeTrabalho->getId())) / 60 .' Horas</td>'
                                . '</tr>';
                            $contInvalido++;
                        }  
                    }
                    
                    if($contInvalido > 0){
                        echo '<h6>CADASTROS INVÁLIDOS: '.$contInvalido.'</h6>'
                    . '<table class="table table-sm table-bordered" style="font-size: 12px;">'
                            . '<thead>'
                                . '<tr>'
                                    . '<th>MATRÍCULA</th>'
                                    . '<th>NOME</th>'
                                    . '<th>CPF</th>'
                                    . '<th>PIS</th>'
                                    . '<th>FUNÇÃO</th>'
                                    . '<th>JORNADA</th>'
                                    . '<th>CH</th>'
                                . '</tr>'
                            . '</thead>'
                            . '<tbody>'
                                . $linhasInvalido                      
                            . '</tbody>'
                         . '</table>'
                                
                                ;                         
                    }                                         
                                     
                    echo '<h6>CADASTROS VÁLIDOS: '.$contValido.'</h6>  <table class="table table-sm table-bordered" style="font-size: 12px;">'
                            . '<thead>'
                                . '<tr>'
                                    . '<th>MATRÍCULA</th>'
                                    . '<th>NOME</th>'
                                    . '<th>CPF</th>'
                                    . '<th>PIS</th>'
                                    . '<th>FUNÇÃO</th>'
                                    . '<th>JORNADA</th>'
                                    . '<th>CH</th>'
                                . '</tr>'
                            . '</thead>'
                            . '<tbody>'
                                . $linhasValido                            
                            . '</tbody>'
                         . '</table>'
                            ;
                    
                    $link = "";
                    $target = '';
                    $bloquear = 'disabled';
                    if($contValido > 0){
                        $link = 'href="/ponto/exportar?id='.$obj->getId_unidade().'&de='.$_de.'&ate='.$_ate.'&mes_competencia='.$_mes_competencia.'&ano_competencia='.$_ano_competencia.'"';
                        $target='target="_blank"';
                        $bloquear = "";
                    }
                    
                    echo '<div class="text-right"><a '.$link.' '.$target.' '.$bloquear.' class="btn btn-info btn-sm"><i class="fas fa-download"></i> Gerar Arquivo </a></div>';
                    
                }
                
              ?>
                  </div>
         </div>
             
          </div>
          
        </div>
      </div>
        
    </main>
