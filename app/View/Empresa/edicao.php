    <?php
    
    use Lib\SubNavPrimicipalDashboard;
    use Lib\Form;
    use App\Repositorios\RepositorioEmpresa;
    use App\Models\Empresa;
    use App\Repositorios\RepositorioEndereco;
    use App\Models\Endereco;
    
    $subNav = new SubNavPrimicipalDashboard();
    
    $id_empresa = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
    
    $repositorioEmpresa = new RepositorioEmpresa();
    $empresa = new Empresa();
    $empresa = $repositorioEmpresa->getEmpresa($id_empresa);
    $repositorioEndereco = new RepositorioEndereco();
    $endereco = new Endereco();
    $endereco = $repositorioEndereco->getEndereco($empresa->getId_endereco());
    
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 class="mb-3 line-head" id="containers">Editar</h2>
            </div>
          </div>
        </div>       
           
      <div class="row">
          <div class="col-lg-12">
              
            <?php           
                echo Form::beginForm("POST", "/empresa/editar")     
                        . Form::getHidden("tx_id_empresa", $empresa->getId_empresa())
                        . Form::getInput("text", "tx_nome_empresa", "Nome da Empresa", "Nome", "col-md-4", true, $empresa->getNome(), false, null, 200 )       
                        . Form::getInput("text", "tx_nome_fantasia", "Nome Fantasia", "Nome Fantasia", "col-md-5", true, $empresa->getNome_fantasia(), false, null, 200 )
                        . Form::getInput("text", "tx_cnpj", "CNPJ", "99.999.999/9999-99", "col-md-3", false, $empresa->getCnpj(), false, "99.999.999/9999-99" )
                        . Form::getInput("text", "tx_cep", "CEP", "59775-000", "col-md-3", false, $endereco->getCep() , false, "99999-999")
                        . Form::getInput("text", "tx_logradouro", "Rua", "Nome da Rua/Av.", "col-md-7", false, $endereco->getLogradouro(), false, null, 200)
                        . Form::getInput("text", "tx_numero", "Número", "número", "col-md-2", false, $endereco->getNumero(), false, null, 5)
                        . Form::getInput("text", "tx_complemento", "Complemento", "Complemento", "col-md-6", false,$endereco->getComplemento(), false, null, 200)
                        . Form::getInput("text", "tx_bairro", "Bairro", "Bairro", "col-md-6", false, $endereco->getBairro(), false, null, 200)
                        . Form::getInput("text", "tx_cidade", "Cidade", "Cidade", "col-md-6", false, $endereco->getCidade(), false, null, 200)                        
                        . Form::getSelectUF("sel_uf", "UF", "col-md-6", FALSE, $endereco->getUf())
                        . Form::getInput("text", "tx_telefone", "Telefone", "(99) 9999-9999", "col-md-3", false, $endereco->getTelefone(), false, "(99) 9999-9999")
                        . Form::getInput("text", "tx_celular", "Celular", "(99) 99999-9999", "col-md-3", false, $endereco->getCelular(), false, "(99) 99999-9999")
                        . Form::getInput("text", "tx_email", "E-Mail", "email@email.com", "col-md-6", false, $endereco->getEmail(), false, null, 200)
                        . Form::getInputButtonSubmit("btn_salvar", "Salvar", "btn-primary")
                        . Form::getButtonCancelar("/empresa")
                    . Form::endForm();
                        
            ?>
          
          </div>
          
        </div>
      </div>
    </main>
    
    <?php echo Form::getScritpCorreiosEndereco(); ?>
