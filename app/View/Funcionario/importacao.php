  <?php
    
    use Lib\SubNavPrimicipalDashboard;
    use Lib\Form;
    use App\Repositorios\RepositorioPessoa;
    use App\Models\Dimensionamento\Servidor;
    use App\Repositorios\RepositorioFuncionario;
    use App\Models\Funcionario;
    use App\Models\Pessoa;
    use App\Repositorios\RepositorioServidor;
    use Lib\Auxiliar;
    
    $subNav = new SubNavPrimicipalDashboard();
    
    $_cpf = filter_input(INPUT_GET, "cpf", FILTER_SANITIZE_STRING);
    
    $_array_genero[] = []; 
    
    $_servidor = new Servidor();
    $_pessoa = new Pessoa();
    $mensagemPessoaCadastrada = false;

    $encontrado = false;
    $buscar = true;
    
    if($_cpf){
        $repositorioPessoa = new RepositorioPessoa();
        $pessoaTmp = $repositorioPessoa->getPessoaPorCpf($_cpf);
        
        if($pessoaTmp->getId_pessoa() > 0){
            $mensagemPessoaCadastrada = true;
            $buscar = true;    
            $encontrado = true;
        }else{
            $repositorioServidor = new RepositorioServidor();
            $_servidor = $repositorioServidor->getServidorCPF($_cpf);

            if((!is_null($_servidor->getNome_servidor()) && $_servidor->getNome_servidor() != "")){
                $encontrado = true;
            }       

            if($encontrado){
                $buscar = false;
            }else{
                $buscar = true;
            }  
        }       
    }else{
        $_cpf = "";        
    }
       
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 class="mb-3 line-head" id="containers">Importar</h2>
            </div>
          </div>
        </div>       
        
    <?php
    
        if($buscar){
            if(!$encontrado && $_cpf != ""){
                
                echo ' <div class="row">
                        <div class="col-lg-12">           
                            <div class="bs-component">
                                <div class="alert alert-dismissible alert-warning">
                                    <button class="close" type="button" data-dismiss="alert">×</button>                
                                    <strong>Atenção!</strong> Não encontrado nenhum funcionário com o CPF informado!
                            </div>
                          </div>
                        </div>
                      </div>';                
            }
            
            if($_cpf != "" && $mensagemPessoaCadastrada){
                echo ' <div class="row">
                        <div class="col-lg-12">           
                            <div class="bs-component">
                                <div class="alert alert-dismissible alert-warning">
                                    <button class="close" type="button" data-dismiss="alert">×</button>                
                                    <strong>Atenção!</strong> Já existe um Cadastro de Funcionário com o CPF informado!
                            </div>
                          </div>
                        </div>
                      </div>';
            }
    ?>
       <div class="row">
          <div class="col-lg-12">
              
            <?php           
            
                echo Form::beginForm("get", "/funcionario/importacao")               
                        . Form::getInput("text", "cpf", "Informe o CPF", "CPF", "col-md-3", true, $_cpf, false, "999.999.999-99" )       
                        .'<div class="col col-md-9"></div>'
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
                $array_genero = array();

                $array_genero[0]['id'] = "MASCULINO";
                $array_genero[0]['value'] = "MASCULINO";

                $array_genero[1]['id'] = "FEMININO";
                $array_genero[1]['value'] = "FEMININO";
                
                $_genero = "";
                if($_servidor->getSexo() == "M"){
                    $_genero = "MASCULINO";
                }else if($_servidor->getSexo() == "F"){
                    $_genero = "FEMININO";
                }
                
                $_dt_nascimento = explode(" ", $_servidor->getDt_nascimento_servidor());
                
                $_bloquerar_pis = true;
                if(is_null($_servidor->getPis()) or $_servidor->getPis() == ""){
                    $_bloquerar_pis = false;
                }
                
                echo Form::beginForm("POST", "/funcionario/cadastrar")  
                        . Form::getInput("text", "tx_cpf", "CPF", "CPF", "col-md-3", true, $_cpf, true, "999.999.999-99" )
                        . Form::getInput("text", "tx_pis", "PIS", "PIS", "col-md-3", true, $_servidor->getPis(), $_bloquerar_pis, "99999999999" )    
                        . Form::getInput("text", "tx_matricula", "Matrícula", "Matrícula", "col-md-3", true, null, false, "99999999" )
                        . Form::getInput("text", "tx_rg", "RG", "RG", "col-md-3", false, null, false, null, 20 )
                        
                        . Form::getInput("text", "tx_nome", "Nome", "Nome", "col-md-6", true, $_servidor->getNome_servidor(), false, null, 200 )
                        . Form::getSelect($array_genero, "tx_genero", "Gênero", "col-md-3", true, $_genero)
                        . Form::getInput("date", "tx_data_de_nascimento", "Data De Nascimento", "Data", "col-md-3", true, $_dt_nascimento[0] , false )
                        
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
  