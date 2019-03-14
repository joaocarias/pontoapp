    <?php
    
    use Lib\SubNavPrimicipalDashboard;
    use Lib\Form;
    use App\Repositorios\RepositorioUnidade;
    use App\Models\Unidade;
    
    $subNav = new SubNavPrimicipalDashboard();
    $id_unidade = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
    
    $repositorioUnidade = new RepositorioUnidade();
    $unidade = $repositorioUnidade->getObj($id_unidade);
    
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
                echo Form::beginForm("POST", "/unidade/editar")
                        . Form::getHidden("tx_id_unidade", $id_unidade )
                        . Form::getInput("text", "tx_nome_unidade", "Nome da Unidade", "Nome", "col-md-12", true, $unidade->getNome(), false, null, 200 )       
                        . Form::getInputButtonSubmit("btn_salvar", "Salvar", "btn-primary btn-sm")
                        . Form::getButtonCancelar("/unidade")
                        . Form::endForm();                        
            ?>
          
          </div>
          
        </div>
      </div>
    </main>
   

