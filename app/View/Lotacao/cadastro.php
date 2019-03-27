    <?php
    
    use Lib\SubNavPrimicipalDashboard;
    use Lib\Form;
    use App\Repositorios\RepositorioUnidade;
    use App\Repositorios\RepositorioFuncao;
    use App\Repositorios\RepositorioFuncionario;
    use App\Repositorios\RepositorioPessoa;
    use App\Repositorios\RepositorioTipoJornadaDeTrabalho;
       
    
    $subNav = new SubNavPrimicipalDashboard();
    
    $_id_funcionario = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
    
    $repositorioUniadade = new RepositorioUnidade();
    $repositorioFuncao = new RepositorioFuncao();
    $repositorioPessoa = new RepositorioPessoa();
    $repositorioFuncionario = new RepositorioFuncionario();
    
    $funcionario = $repositorioFuncionario->getFuncionario($_id_funcionario);
    $pessoa = $repositorioPessoa->getPessoa($funcionario->getId_pessoa());
    
     $repositorioTipoJornadaDeTrabalho = new RepositorioTipoJornadaDeTrabalho();
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
                <h2 class="mb-3 line-head" id="containers">Cadastro <small>Informe sobre a Lotação</small></h2>
            </div>
          </div>
        </div>       
                   
      <div class="row">
          <div class="col-lg-12">
            <?php
                echo Form::beginForm("POST", "/lotacao/cadastrar")  
                        . Form::getHidden("tx_id_funcionario", $_id_funcionario)
                        . Form::getInput("text", "tx_nome_pessoa", "Nome", "Nome", "col-md-4", false, $pessoa->getNome(), true)
                        . Form::getInput("text", "tx_cpf_pessoa", "CPF", "CPF", "col-md-4", false, $pessoa->getCpf(), true)
                        . Form::getInput("text", "tx_pis_pessoa", "PIS", "PIS", "col-md-4", false, $funcionario->getPis(), true)
                        . Form::getSelect($repositorioUniadade->getArrayBasic(), "tx_id_unidade", "Unidade", "col-md-4", true, null)
                        . Form::getSelect($repositorioFuncao->getArrayBasic(), "tx_id_funcao", "Função", "col-md-4", true, null)
                        . Form::getInput('date', "tx_inicio_lotacao", "Início da Lotação", "", "col-md-4", TRUE, null)
                                                                 
                        . Form::getInputButtonSubmit("btn_salvar", "Salvar", "btn-primary btn-sm")
                        . Form::getButtonCancelar("/funcionario/detalhes?id={$_id_funcionario}")
                        . Form::endForm();                        
            ?>          
          </div>
          
        </div>
      </div>
    </main>
   

