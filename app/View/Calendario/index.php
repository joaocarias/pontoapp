<?php

 use Lib\SubNavPrimicipalDashboard;
  
    $subNav = new SubNavPrimicipalDashboard();
            
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
                      $ano_atual = (int) date('Y');
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
                      $mes_atual = date('m');
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
                  <span style="color: #33639d; margin-left: 5px;">Unidade:</span>
                  <?php
                  //selecionarUnidadesVinculo($_SESSION['id_servidor']);
                  //echo $_SESSION['id_vinculo']
                  ?>

                  <br><br><br>

                  <table class="table table-sm table-bordered table-striped tabela_calendario">
                      <tr>
                          <th class="info_busca_primeiro">
                              DATA ENTRADA
                          </th>
                          <th class="info_busca_meio">
                              ENTRADA
                          </th>
                          <th class="info_busca_meio">
                              DATA SA&Iacute;DA
                          </th>
                          <th class="info_busca_meio">
                              SA&Iacute;DA
                          </th>
                          <th class="info_busca_meio">
                              TRABALHADA
                          </th>
                          <th class="info_busca_meio">
                              HORA JUSTIFICADA
                          </th>
                          <th class="info_busca_meio">
                              STATUS
                          </th>
                          <th class="info_busca_ultima">
                              JUSTIFICAR
                          </th>
                          <!--                <th class="info_busca_ultima">
                                              JUSTIFICATIVA APROVADA
                                          </th>-->
                      </tr>

                      <?php echo $calendario; ?>

                  </table>
          </div>
        </div>
      </div>
        
          
        
    </main>



