 <?php
    
    use Lib\SubNavPrimicipalDashboard;
    use Lib\Form;
    use App\Repositorios\RepositorioFeriado;
    use App\Models\Feriado;
    
    $id_feriado = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
    
    $repositorio = new RepositorioFeriado();
    $obj = $repositorio->getObj($id_feriado);
    
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
            <?php
                echo Form::beginForm("POST", "/feriado/editar") 
                        . Form::getHidden("tx_id_feriado", $id_feriado )
                        . Form::getInput("date", "tx_data_feriado", "Data do Feriado", "Data", "col-md-3", true, $obj->getDt_feriado(), false )
                        . Form::getInput("text", "tx_nome_feriado", "Descrição do Feriado", "Descrição do Feriado", "col-md-9", true, $obj->getNome(), false, null, 200 )       
                        . Form::getInputButtonSubmit("btn_salvar", "Salvar", "btn-primary btn-sm")
                        . Form::getButtonCancelar("/feriado")
                        . Form::endForm();
                        
            ?>
          
          </div>
          
        </div>
      </div>
    </main>