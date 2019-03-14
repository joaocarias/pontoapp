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
            <?php
                echo Form::beginForm("POST", "/feriado/cadastrar")               
                        . Form::getInput("date", "tx_data_feriado", "Data do Feriado", "Data", "col-md-3", true, null, false )
                        . Form::getInput("text", "tx_nome_feriado", "Descrição do Feriado", "Descrição do Feriado", "col-md-9", true, null, false, null, 200 )       
                        . Form::getInputButtonSubmit("btn_salvar", "Salvar", "btn-primary btn-sm")
                        . Form::getButtonCancelar("/feriado")
                        . Form::endForm();
                        
            ?>
          
          </div>
          
        </div>
      </div>
    </main>