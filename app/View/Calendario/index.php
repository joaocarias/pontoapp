<?php

 use Lib\SubNavPrimicipalDashboard;
  
    $subNav = new SubNavPrimicipalDashboard();

    $dia_hoje = date('d');
    if($dia_hoje < "16"){
        $mes_atual = date('m', strtotime('-1 Month', strtotime(date('Y-m-d'))));
        $ano_atual = (int) date('Y', strtotime('-1 Month', strtotime(date('Y-m-d'))));

    }
    else{

        $mes_atual = date('m');
        $ano_atual = (int) date('Y');
    }

    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row" style="text-align: center">
          <div class="col-lg-12">

              <span class="titulodetalhes">
                  Detalhamento do Ponto Digital -
                  <font style="text-transform: uppercase;"><?php echo $_SESSION['nome_pessoa'] ?>;</font>
                  <font style="font-size: 11pt"> <?php echo " CPF.: " . $_SESSION['cpf_pessoa']; ?></font>
              </span>
              <br />
              <div style="text-align: center; margin-top: 20px; margin-bottom: 20px; ">
                  <span style="color: #33639d;">Ano: </span>
                  <select name="ano" id="ano" onchange="buscar_calendario();">
                      <?php

                      $arr_ano = array(
                          '2014' => '2014',
                          '2015' => '2015',
                          '2016' => '2016',
                          '2017' => '2017',
                          '2018' => '2018',
                          '2019' => '2019',
                          '2020' => '2020');

                      for ($ano = 2015; $ano <= $ano_atual; $ano++) {
                          print("<option value=\"$ano\"");
                          if ($ano == $ano_atual) {
                              print("selected");
                          }
                          print(">$ano");
                      }
                      ?>
                  </select>
                  <span style="color: #33639d; margin-left: 5px;">M&ecirc;s:</span>
                  <select name="mes" id="mes" onchange="buscar_calendario();">
                      <?php

                      $arr_meses = array(
                          '01' => 'Janeiro',
                          '02' => 'Fevereiro',
                          '03' => 'Mar&ccedil;o',
                          '04' => 'Abril',
                          '05' => 'Maio',
                          '06' => 'Junho',
                          '07' => 'Julho',
                          '08' => 'Agosto',
                          '09' => 'Setembro',
                          '10' => 'Outubro',
                          '11' => 'Novembro',
                          '12' => 'Dezembro');
                      foreach ($arr_meses as $mes => $meses) {
                          print("<option value=\"$mes\"");
                          if ($mes == $mes_atual) {
                              print("selected");
                          }
                          print(">$meses");
                      }
                      ?>

                  </select>
                  <!-- <span style="color: #33639d; margin-left: 5px;">Unidade:</span> -->
                  <?php
                  //selecionarUnidadesVinculo($_SESSION['id_servidor']);
                  //echo $_SESSION['id_vinculo']
                  ?>

                  <br>

                      <?php echo $calendario; ?>

          </div>
        </div>
      </div>
        
          
        
    </main>



