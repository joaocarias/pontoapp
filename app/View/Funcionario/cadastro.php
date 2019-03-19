  <?php
    
    use Lib\SubNavPrimicipalDashboard;
    use Lib\Form;
    use App\Repositorios\RepositorioPessoa;
    use App\Models\Pessoa;
    use App\Repositorios\RepositorioFuncionario;
    use App\Models\Funcionario;
    
    $subNav = new SubNavPrimicipalDashboard();
    
    $_cpf = filter_input(INPUT_GET, "cpf", FILTER_SANITIZE_STRING);
    $_pis = filter_input(INPUT_GET, "pis", FILTER_SANITIZE_STRING);
    $_pessoa = new Pessoa();
    $_funcionario = new Funcionario();
    $encontrado = false;
    $buscar = true;
    
    if($_cpf && $_pis){
        $repositorioPessoa = new RepositorioPessoa();
        $_pessoa = $repositorioPessoa->getPessoaPorCpf($_cpf);
        
        $repositorioFuncionario = new RepositorioFuncionario();
        $_funcionario = $repositorioFuncionario->getFuncionarioPorPIS($_pis);
        
        if((!is_null($_pessoa->getId_pessoa()) && $_pessoa->getId_pessoa() != "" && $_pessoa->getId_pessoa() > 0)){
            $encontrado = true;
        }       
        
        if(((!is_null($_funcionario->getId()) && $_funcionario->getId() != "" && $_funcionario->getId() > 0))){
            $encontrado = true;
        }

        if($encontrado){
            $buscar = true;
        }else{
            $buscar = false;
        }
    }else{
        $_cpf = "";
        $_pis = "";
    }
       
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 class="mb-3 line-head" id="containers">Cadastro</h2>
            </div>
          </div>
        </div>       
        
    <?php
    
        if($buscar){
            if($encontrado){
                
                echo ' <div class="row">
                        <div class="col-lg-12">           
                            <div class="bs-component">
                                <div class="alert alert-dismissible alert-warning">
                                    <button class="close" type="button" data-dismiss="alert">×</button>                
                                    <strong>Atenção!</strong> Já existe um funcionário com o CPF e/ou PIS informado!
                            </div>
                          </div>
                        </div>
                      </div>';                
            }
    ?>
       <div class="row">
          <div class="col-lg-12">
              
            <?php           
            
                echo Form::beginForm("get", "/funcionario/cadastro")               
                        . Form::getInput("text", "cpf", "Informe o CPF", "CPF", "col-md-3", true, $_cpf, false, "999.999.999-99" )       
                        . Form::getInput("text", "pis", "Informe o PIS", "PIS", "col-md-3", true, $_pis, false, "99999999999" )       
                        .'<div class="col col-md-6"></div>'
                        . Form::getInputButtonSubmit("btn_proximo", "Próximo", "btn-primary btn-sm")
                        . Form::getButtonCancelar("/funcionario")
                        . Form::endForm();                        
            ?>          
          </div>          
        </div>
          
    <?php
            
        }else{
            
    ?>
          <div class="row">
          <div class="col-lg-12">
            <?php
                echo Form::beginForm("POST", "/funcionario/cadastrar")  
                        . Form::getInput("text", "tx_cpf", "CPF", "CPF", "col-md-3", true, $_cpf, true, "999.999.999-99" )
                        . Form::getInput("text", "tx_pis", "PIS", "PIS", "col-md-3", true, $_pis, true, "99999999999" )     
                        . Form::getInput("text", "tx_rg", "RG", "RG", "col-md-3", false, null, false, null, 20 )
                        . Form::getInput("date", "tx_data_de_nascimento", "Data De Nascimento", "Data", "col-md-3", true, null, false )
                        . Form::getInput("text", "tx_nome", "Nome", "Nome", "col-md-6", true, null, false, null, 200 )
                        . Form::getInput("text", "tx_apelido", "Apelido", "Apelido", "col-md-6", false, null, false, null, 200 )
                        
                        . Form::getInput("text", "tx_cep", "CEP", "59775-000", "col-md-3", false, null, false, "99999-999")
                        . Form::getInput("text", "tx_logradouro", "Rua", "Nome da Rua/Av.", "col-md-7", false, null, false, null, 200)
                        . Form::getInput("text", "tx_numero", "Número", "número", "col-md-2", false, null, false, null, 5)
                        . Form::getInput("text", "tx_complemento", "Complemento", "Complemento", "col-md-6", false, null, false, null, 200)
                        . Form::getInput("text", "tx_bairro", "Bairro", "Bairro", "col-md-6", false, null, false, null, 200)
                        . Form::getInput("text", "tx_cidade", "Cidade", "Cidade", "col-md-6", false, null, false, null, 200)                        
                        . Form::getSelectUF("sel_uf", "UF", "col-md-6", FALSE, null)
                        . Form::getInput("text", "tx_telefone", "Telefone", "(99) 9999-9999", "col-md-3", false, null, false, "(99) 9999-9999")
                        . Form::getInput("text", "tx_celular", "Celular", "(99) 99999-9999", "col-md-3", false, null, false, "(99) 99999-9999")
                        . Form::getInput("text", "tx_email", "E-Mail", "email@email.com", "col-md-6", false, null, false, null, 200)
                        
                        . Form::getInputButtonSubmit("btn_salvar", "Salvar", "btn-primary btn-sm")
                        . Form::getButtonCancelar("/funcionario")
                        . Form::endForm();                        
            ?>          
          </div>          
        </div>
          
    <?php
             
        }   
    ?>
            
      </div>
    </main>
   


