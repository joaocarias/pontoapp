<?php

 use Lib\SubNavPrimicipalDashboard;
    use Lib\Form;
    
    $subNav = new SubNavPrimicipalDashboard();
    
    $id_usuario = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
    
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 class="mb-3 line-head" id="containers">Resetar Senha</h2>
            </div>
          </div>
        </div>       
     
          <?php
            $_mensagem = "Sua senha será alterada para 123456.";
            $_tipo_mensagem = "warning";
                if($id_usuario <= 0){
                    $_mensagem = "Não foi possível identificar o Usuário.";
                    $_tipo_mensagem = "danger";
                }
          ?>
          
          
       <div class="row">
          <div class="col-lg-12">           
            <div class="bs-component">
              <div class="alert alert-dismissible alert-<?=$_tipo_mensagem?>">
                <button class="close" type="button" data-dismiss="alert">×</button>                
                <strong>Atenção!</strong> <?=$_mensagem?>
              </div>
            </div>
          </div>
        </div>
                    
      <div class="row">
          <div class="col-lg-12">
            <?php
                echo Form::beginForm("POST", "/usuario/atualizarsenha")
                        . Form::getHidden("tx_id_usuario", $id_usuario )
                        . Form::getHidden("tx_nova_senha", "123456")
                        . Form::getInputButtonSubmit("btn_salvar", "Confirmar", "btn-primary")
                        . Form::getButtonCancelar("/dashboard")
                        . Form::endForm();                        
            ?>
          
          </div>
          
        </div>
      </div>
    </main>


