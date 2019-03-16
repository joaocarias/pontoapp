    <?php
    
    use Lib\SubNavPrimicipalDashboard;
    use Lib\Form;
    use App\Repositorios\RepositorioFuncao;
    use App\Models\Funcao;
    
    $subNav = new SubNavPrimicipalDashboard();
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
    
    $repositorio = new RepositorioFuncao();
    $obj = $repositorio->getObj($id);
    
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
                echo Form::beginForm("POST", "/funcao/editar")
                        . Form::getHidden("tx_id_funcao", $id )
                        . Form::getInput("text", "tx_nome_funcao", "Nome da Função", "Nome", "col-md-12", true, $obj->getNome(), false, null, 200 )       
                        . Form::getInputButtonSubmit("btn_salvar", "Salvar", "btn-primary btn-sm")
                        . Form::getButtonCancelar("/funcao")
                        . Form::endForm();                        
            ?>          
          </div>
          
        </div>
      </div>
    </main>
   

