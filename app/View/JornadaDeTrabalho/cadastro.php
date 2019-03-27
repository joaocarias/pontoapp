    <?php
    
    use Lib\SubNavPrimicipalDashboard;
    use Lib\Form;
    use App\Repositorios\RepositorioTipoJornadaDeTrabalho;
    use App\Repositorios\RepositorioJornadaDeTrabalho;
    
    $subNav = new SubNavPrimicipalDashboard();
    
    $_id_funcionario = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
    $_id_lotacao = filter_input(INPUT_GET, "id_lotacao", FILTER_SANITIZE_STRING);
    $_id_tipo = filter_input(INPUT_GET, "id_tipo_jornada_de_trabalho", FILTER_SANITIZE_STRING);
        
    $repositorioTipoJornadaDeTrabalho = new RepositorioTipoJornadaDeTrabalho();
    $repositorioJornadaDeTrabalho = new RepositorioJornadaDeTrabalho();
    
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
                <h2 class="mb-3 line-head" id="containers">Cadastro <small>Informe sobre a Jornada de Trabalho</small></h2>
            </div>
          </div>
        </div>       
          
          
          
          
      <div class="row">
          <div class="col-lg-12">
            <?php
            
                if($_id_tipo){
                    echo Form::beginForm("POST", "/lotacaojornadadetrabalho/cadastrar")  
                        . Form::getHidden("id", $_id_funcionario)
                        . Form::getHidden("id_lotacao", $_id_lotacao)
                        . Form::getSelect($repositorioTipoJornadaDeTrabalho->getArrayBasic(), "tx_id_tipo_jornada_de_trabalho", "Tipo de Jornada", "col-md-4", true, $_id_tipo, TRUE)
                        . Form::getSelect($repositorioJornadaDeTrabalho->getArrayBasic($_id_tipo), "tx_id_jornada_de_trabalho", "Jornada", "col-md-8", true, null)
                       
                        . Form::getInputButtonSubmit("btn_salvar", "Salvar", "btn-primary btn-sm")
                        . Form::getButton("/jornadadetrabalho/cadastro?id={$_id_funcionario}&id_lotacao={$_id_lotacao}", "Voltar", "btn-info btn-sm")
                        . Form::getButtonCancelar("/funcionario/detalhes?id={$_id_funcionario}")
                        . Form::endForm();
                }else{
                    echo Form::beginForm("GET", "/jornadadetrabalho/cadastro")  
                        . Form::getHidden("id", $_id_funcionario)
                        . Form::getHidden("id_lotacao", $_id_lotacao)
                        . Form::getSelect($repositorioTipoJornadaDeTrabalho->getArrayBasic(), "id_tipo_jornada_de_trabalho", "Tipo de Jornada", "col-md-4", true, null)
                        ."<div class='col-md-8'></div>"
                        . Form::getInputButtonSubmit("btn_proximo", "Próximo", "btn-primary btn-sm")
                        . Form::getButtonCancelar("/funcionario/detalhes?id={$_id_funcionario}")
                        . Form::endForm();
                }
            
                                        
            ?>          
          </div>
          
        </div>
      </div>
    </main>
   

