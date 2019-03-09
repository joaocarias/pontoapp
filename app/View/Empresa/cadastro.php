    <?php
    
    use Lib\SubNavPrimicipalDashboard;
    use Lib\Form;
    
    $subNav = new SubNavPrimicipalDashboard();
    
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
     
       <div class="row">
          <div class="col-lg-12">           
            <div class="bs-component">
              <div class="alert alert-dismissible alert-warning">
                <button class="close" type="button" data-dismiss="alert">×</button>                
                <strong>Atenção!</strong> Não encontrado uma empresa para o usuário, é necessário realizar o cadastro. Se empresa já cadastrada, por favor, saia do sistema e entre novamente!
              </div>
            </div>
          </div>
        </div>
                    
      <div class="row">
          <div class="col-lg-12">
            <?php
                echo Form::beginForm("POST", "/empresa/cadastrar")               
                        . Form::getInput("text", "tx_nome_empresa", "Nome da Empresa", "Nome", "col-md-4", true, null, false, null, 200 )       
                        . Form::getInput("text", "tx_nome_fantasia", "Nome Fantasia", "Nome Fantasia", "col-md-5", true, null, false, null, 200 )
                        . Form::getInput("text", "tx_cnpj", "CNPJ", "99.999.999/9999-99", "col-md-3", false, null, false, "99.999.999/9999-99" )
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
                        . Form::getInputButtonSubmit("btn_salvar", "Salvar", "btn-primary")
                        . Form::endForm();
                        
            ?>
          
          </div>
          
        </div>
      </div>
    </main>
    
    <?php echo Form::getScritpCorreiosEndereco(); ?>
