<?php

namespace App\Controllers;

use App\Repositorios\RepositorioFeriado;
use Lib\Controller;
use Lib\DownloadTXT;
    
use App\Repositorios\RepositorioUnidade;
use App\Repositorios\RepositorioLotacao;
use App\Repositorios\RepositorioFuncionario;    
use App\Repositorios\RepositorioJornadaDeTrabalho;
use App\Repositorios\RepositorioLotacaoJornadaDeTrabalho;
use App\Repositorios\RepositorioRegistro;
use App\Repositorios\RepositorioRegistroDePonto;

use App\Models\Unidade;
use App\Models\Lotacao;
use App\Models\Funcionario;
use App\Models\LotacaoJornadaDeTrabalho;
use App\Models\JornadaDeTrabalho;
use App\Models\Dimensionamento\Registro;
use App\Models\RegistroDePonto;

class CalendarioController extends Controller {
    public function index($request, $response){
       $controller = 'Calendario';
       $action = 'index';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;

        $vars['calendario'] = $this->gerar_calendario($_SESSION['id_pessoa']);

       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }

    public function justificativa($request, $response){
        $controller = 'Calendario';
        $action = 'justificativa';

        $vars['action'] = $action;
        $vars['controller'] = $controller;
        $_SESSION['controller'] = $controller;
        $_SESSION['action'] = $action;

        return $this->view->render($response, 'layout_dashboard.php', $vars);
    }

    public function gerar_calendario($id_pessoa){

        $RepFuncionario = new RepositorioFuncionario();
        $id_funcionario = $RepFuncionario->getFuncionarioPorIdPessoa($id_pessoa)->getId();

        $dia_hoje = date('d');
        if($dia_hoje < "16"){
            $mes_ini = date('m', strtotime('-1 Month', strtotime(date('Y-m-d'))));
            $ano_ini = date('Y', strtotime('-1 Month', strtotime(date('Y-m-d'))));

            $mes_fim = date('m');
            $ano_fim = date('Y');

            $dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes_ini, $ano_ini);
        }
        else{
            $mes_fim = date('m', strtotime('+1 Month', strtotime(date('Y-m-d'))));
            $ano_fim = date('Y', strtotime('+1 Month', strtotime(date('Y-m-d'))));

            $mes_ini = date('m');
            $ano_ini = date('Y');

            $dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes_ini, $ano_ini);
        }



        //$dataLimite = getDataLimite($mes, $ano, 3);
        //$acao_justificar = verificarDataDentroDoPrazo($dataLimite);

        $repositorioRegistroDePonto = new RepositorioRegistroDePonto();
        $array = $repositorioRegistroDePonto->getRegistrosDePonto($id_funcionario, $mes_ini, $ano_ini);

        $num_linhas = count($array);

        $cont = 0;
        $hrs_trabalhadas = 0;
        $tabela = "";

        $repositorioFeriado = new RepositorioFeriado();
        $feriados = $repositorioFeriado->getFeriados($ano_ini."-".$mes_ini."-16", $ano_fim."-".$mes_fim."-15");

        //print_r($feriados);

        $d = 16;
        $mes = $mes_ini;
        $ano = $ano_ini;
        while ($d <= $dias_do_mes) {
            $encontrado = 0;
            if ($d < 10) {
                $dia = '0'.$d;
            } else {
                $dia = $d;
            }

            $feriado = "";
            $diaSemana_ = $this->diaDaSemana($dia, $mes, $ano);

            if($repositorioFeriado->verificaFeriado($ano."-".$mes."-".$dia, $feriados)){
                if($cont % 2 == 0){
                    $info_busca = "info_busca_1";
                }else{
                    $info_busca = "info_busca_2";
                }
                //$feriado = "<tr class='".$info_busca."'><th style='height: 40px;'>FERIADO</th><td colspan='6' style=font-size: 9pt; font-weight: normal;'>"
                //    . "". "teste" . "</td><td></td></tr>";
                $feriado = $repositorioFeriado->getFeriado($ano."-".$mes."-".$dia)->getNome();
            }
            else{
                $i = 0;
                while($i < $num_linhas){
                    $dataSaida_ = "";
                    $obs = "<td>  </td>";
                    $status = "<td> --- </td>";
                    if($d == $array[$i]->dia_entrada){
                        if($array[$i]->dia_saida == 0){
                            $dataSaida_ = "";
                            $array[$i]->hora_saida = "";
                        }else{

                            if ($array[$i]->dia_saida < 10) {
                                $dia_saida = '0' . $array[$i]->dia_saida;
                            } else {
                                $dia_saida = $array[$i]->dia_saida;
                            }

                            if ($array[$i]->mes_saida < 10) {
                                $mes_saida = '0' . $array[$i]->mes_saida;
                            } else {
                                $mes_saida = $array[$i]->mes_saida;
                            }

                            $dataSaida_ = $dia_saida . '/' . $mes_saida. '/' . $array[$i]->ano_saida . ' - ' . $this->diaDaSemana($array[$i]->dia_saida, $array[$i]->mes_saida, $array[$i]->ano_saida);
                        }

                        //if($array[$i]['horas_justificadas'] == ""){
                            $horas_justificadas_ = " --- ";
                        //}else{
                          //  $horas_justificadas_ = $array[$i]['horas_justificadas'];
                        //}

                        if($array[$i]->tempo_atividade == "" || $array[$i]->ponto_em_aberto == 1 || $array[$i]->tempo_atividade == "0"){
                            $trabalhada_ = " --- ";
                        }
                        else{
                            $hrs_trabalhadas += $array[$i]->tempo_atividade;

                            $horas = floor($array[$i]->tempo_atividade / 60);
                            $minutos = $array[$i]->tempo_atividade % 60;

                            if($minutos < 10){
                                $minutos = "0$minutos";
                            }

                            $trabalhada_ = "$horas:$minutos:00";
                        }

                        if($cont % 2 == 0){
                            $info_busca = "info_busca_1";
                        }else{
                            $info_busca = "info_busca_2";
                        }

                        //if($array[$i]['obs'] != ""){
                        //    if($array[$i]['registro_justificado'] == 1){
                                //$obs = "<tr class='".$info_busca."'><th style='height: 40px;'>JUSTIFICATIVA</th><td colspan='6' style=font-size: 9pt; font-weight: normal;'>". $array[$i]->obs . "</td><td></td></tr>";
                        /*        switch ($array[$i]['justificativa_aprovada']){
                                    case '0':
                                        $status = "<td style='font-size: 9pt; font-weight: normal; color: darkorange'>ESPERA</td><td></td>";
                                        break;
                                    case '1';
                                        $status = "<td style='font-size: 9pt; font-weight: normal; color: green'>APROVADO</td><td>". imprimirEditarJustificar($acao_justificar, $idServidor, $idVinculo, $dia, $mes, $ano)."</td>";
                                        break;
                                    case '2';
                                        $status = "<td style='font-size: 9pt; font-weight: normal; color: red'>REPROVADO</td><td>". imprimirEditarJustificar($acao_justificar, $idServidor, $idVinculo, $dia, $mes, $ano)."</td>";
                                        break;
                                }
                            }else{
                                $obs = "<td><tr class='".$info_busca."'><th style='height: 40px;'>AVISO</th><td colspan='6' style='font-size: 13pt; font-weight: normal; color: red;'><strong>". $array[$i]['obs'] . "</strong></td><td>". imprimirEditarJustificar($acao_justificar, $idServidor, $idVinculo, $dia, $mes, $ano)."</td></tr>";
                            }
                        }else{*/
                            $obs = "<td>".$this->imprimeBtnJustificativa($dia, $mes, $ano)."</td></tr>";
                        //}


                        $tabela .= "<tr class=".$info_busca.">"
                            . "<td>" . $dia . "/" . $mes. "/" . $ano . " - " . $diaSemana_ . "</td>"
                            . "<td>" .$array[$i]->hora_entrada." </td>"
                            . "<td>" .$dataSaida_ . "</td>"
                            . "<td> ".$array[$i]->hora_saida." </td>"
                            . "<td> ".$trabalhada_." </td>"

                            . "<td> ".$horas_justificadas_." </td>"
                            . $status
                            . $obs;

                        $cont++;
                        $encontrado++;
                    }
                    $i++;
                }
            }


            if($encontrado == 0){
                if($feriado == ""){
                    if($cont % 2 == 0){
                        $tabela .= '<tr class="info_busca_1"><td>' . $dia . '/' . $mes. '/' . $ano . ' - ' . $diaSemana_ . '</td><td> --- </td><td>' . $dia . '/' . $mes . '/' . $ano . ' - ' . $diaSemana_ . '</td><td> --- </td><td> --- </td><td> --- </td><td> --- </td><td>'.$this->imprimeBtnJustificativa($dia, $mes, $ano).'</td></tr>';
                    }else{
                        $tabela .= '<tr class="info_busca_2"><td>' . $dia . '/' . $mes. '/' . $ano . ' - ' . $diaSemana_ . '</td><td> --- </td><td>' . $dia . '/' . $mes . '/' . $ano . ' - ' . $diaSemana_ . '</td><td> --- </td><td> --- </td><td> --- </td><td> --- </td><td>'.$this->imprimeBtnJustificativa($dia, $mes, $ano).'</td></tr>';
                    }
                }
                else{
                    if($cont % 2 == 0){
                        $tabela .= '<tr class="info_busca_1"><td>' . $dia . '/' . $mes. '/' . $ano . ' - ' . $diaSemana_ . '</td><td> --- </td><td>FERIADO</td><td colspan=\'5\'> '. $feriado .'</td></tr>';
                    }else{
                        $tabela .= '<tr class="info_busca_2"><td>' . $dia . '/' . $mes. '/' . $ano . ' - ' . $diaSemana_ . '</td><td> --- </td><td>FERIADO</td><td colspan=\'5\'> '. $feriado .'</td></tr>';
                    }
                }

                $cont++;
            }

            if($d == 15){
                break;
            }
            if($d == $dias_do_mes){
                $dias_do_mes = 15;
                $d = 1;
                $mes = $mes_fim;
                $ano = $ano_fim;
            }
            else{
                $d++;
            }
        }
        $horas = floor($hrs_trabalhadas / 60);
        $minutos = $hrs_trabalhadas % 60;

        if($minutos < 10){
            $minutos = "0$minutos";
        }

        $hrs_trabalhadas = $horas."h $minutos"."min";


        $html = "
                <div style=\"margin-top: 10px; margin-bottom: 40px;\">
                    <span style=\"color: darkgreen\">Total Final de Horas Contabilizadas (Trabalhada + Justificada):&nbsp; 
                        
                    </span>
                    <br />
                    <span style=\"color: darkblue\">Carga Hor&aacute;ria do m&ecirc;s:&nbsp; 
                         </span>&nbsp;&nbsp;
                    <br />
                    <span>Total de horas Trabalhada:&nbsp; $hrs_trabalhadas
                        </span>&nbsp;&nbsp;
                    <br />
                    <span style=\"color: darkorange\">Total de horas Justificadas:&nbsp; 
                         
                    </span>
                    <br />
                    <br />
                    <span style=\"color: darkblue\">Data Limite para Justificar:&nbsp;
                                               
                            
                         </span>&nbsp;&nbsp;
                    <br />
                </div>


                    <table class=\"table table-sm table-bordered table-striped tabela_calendario\">
                      <tr>
                          <th class=\"info_busca_primeiro\">
                              DATA ENTRADA
                          </th>
                          <th class=\"info_busca_meio\">
                              ENTRADA
                          </th>
                          <th class=\"info_busca_meio\">
                              DATA SA&Iacute;DA
                          </th>
                          <th class=\"info_busca_meio\">
                              SA&Iacute;DA
                          </th>
                          <th class=\"info_busca_meio\">
                              TRABALHADA
                          </th>
                          <th class=\"info_busca_meio\">
                              HORA JUSTIFICADA
                          </th>
                          <th class=\"info_busca_meio\">
                              STATUS
                          </th>
                          <th class=\"info_busca_ultima\">
                              JUSTIFICAR
                          </th>
                          <!--                <th class=\"info_busca_ultima\">
                                              JUSTIFICATIVA APROVADA
                                          </th>-->
                      </tr>

                      $tabela

                  </table>";

        return $html;
    }

    private function diaDaSemana($dia, $mes, $ano) {
        $dia_da_semana = jddayofweek(cal_to_jd(CAL_GREGORIAN, $mes, $dia, $ano), 0);
        // 0 = domingo e 6 = s�bado
        switch ($dia_da_semana) {
            case(0):
                return "Domingo";
                break;
            case(1):
                return "Segunda";
                break;
            case(2):
                return "Ter&ccedil;a";
                break;
            case(3):
                return "Quarta";
                break;
            case(4):
                return "Quinta";
                break;
            case(5):
                return "Sexta";
                break;
            default :
                return "S&aacute;bado";
                break;
        }
    }

    private function imprimeBtnJustificativa($dia, $mes, $ano, $id = NULL){
        $form = '<form action="calendario/justificativa" >
                    <input type="hidden" name="dia" value="' . $dia . '">
                    <input type="hidden" name="mes" value="' . $mes .'">
                    <input type="hidden" name="ano" value="' . $ano . '">';

        if(!empty($id)){
            $form .= '<input type="hidden" name="id" value="' . $id . '">';
        }

        $form .= '<button type="submit" class="btn btn-warning btn-small"><i class="fa fa-edit"></i></button>
                 </form>
                ';

        return $form;
    }
    
}
