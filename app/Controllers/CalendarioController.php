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

    public function gerar_calendario($id_pessoa){

        $RepFuncionario = new RepositorioFuncionario();
        $id_funcionario = $RepFuncionario->getFuncionarioPorIdPessoa($id_pessoa)->getId();

        $mes = date('m');
        $ano = date('Y');

        $dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

        //$dataLimite = getDataLimite($mes, $ano, 3);
        //$acao_justificar = verificarDataDentroDoPrazo($dataLimite);

        $repositorioRegistroDePonto = new RepositorioRegistroDePonto();
        $array = $repositorioRegistroDePonto->getRegistrosDePonto($id_funcionario, $mes, $ano);

        $num_linhas = count($array);

        //echo "Número de batidas = $num_linhas, ";

        //print_r($array);
        $cont = 0;
        $tabela = "";

        $repositorioFeriado = new RepositorioFeriado();
        $feriados = $repositorioFeriado->getFeriados($ano."-".$mes."-01", $ano."-".$mes."-".$dias_do_mes);

        for ($d = 1; $d <= $dias_do_mes; $d++) {
            $encontrado = 0;
            if ($d < 10) {
                $dia = '0' . $d;
            } else {
                $dia = $d;
            }

            $feriado = "";
            $diaSemana_ = $this->diaDaSemana($dia, $mes, $ano);

            if($repositorioFeriado->verificaFeriado($ano."-".$mes."-".$d, $feriados)){
                if($cont % 2 == 0){
                    $info_busca = "info_busca_1";
                }else{
                    $info_busca = "info_busca_2";
                }
                //$feriado = "<tr class='".$info_busca."'><th style='height: 40px;'>FERIADO</th><td colspan='6' style=font-size: 9pt; font-weight: normal;'>"
                //    . "". "teste" . "</td><td></td></tr>";
                $feriado = $repositorioFeriado->getFeriado($ano."-".$mes."-".$d)->getNome();
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
                        }else{
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
                        }else{
                            $obs = "<td>". imprimirEditarJustificar($acao_justificar, $idServidor, $idVinculo, $dia, $mes, $ano)."</td></tr>";
                        }*/


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
                        $tabela .= '<tr class="info_busca_1"><td>' . $dia . '/' . $mes. '/' . $ano . ' - ' . $diaSemana_ . '</td><td> --- </td><td>' . $dia . '/' . $mes . '/' . $ano . ' - ' . $diaSemana_ . '</td><td> --- </td><td> --- </td><td> --- </td><td> --- </td><td>'. ''/*imprimirEditarJustificar($acao_justificar, $idServidor, $idVinculo, $dia, $mes, $ano)*/ .'</td></tr>';
                    }else{
                        $tabela .= '<tr class="info_busca_2"><td>' . $dia . '/' . $mes. '/' . $ano . ' - ' . $diaSemana_ . '</td><td> --- </td><td>' . $dia . '/' . $mes . '/' . $ano . ' - ' . $diaSemana_ . '</td><td> --- </td><td> --- </td><td> --- </td><td> --- </td><td>'. ''/*imprimirEditarJustificar($acao_justificar, $idServidor, $idVinculo, $dia, $mes, $ano)*/.'</td></tr>';
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
        }

        return $tabela;
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
    

    public function exportar($request, $response){
        $idUnidade = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING); 
        $de = filter_input(INPUT_GET, "de", FILTER_SANITIZE_STRING); 
        $ate = filter_input(INPUT_GET, "ate", FILTER_SANITIZE_STRING);
        $mes_competencia = filter_input(INPUT_GET, "mes_competencia", FILTER_SANITIZE_STRING);
        $ano_competencia = filter_input(INPUT_GET, "ano_competencia", FILTER_SANITIZE_STRING);
         
        if($idUnidade){       
            $nomeArquivo = $idUnidade.".txt";
            $meuTexto = "";  
    
            $repositorioUnidade = new RepositorioUnidade();
            $unidade = $repositorioUnidade->getObj($idUnidade);

            $repositorioLotacao = new RepositorioLotacao();
            $lotacoes = $repositorioLotacao->getLotacaoPorUnidade($unidade->getId_unidade());

            $_ponto_evento = "7010";            
            $_ano_mes = "{$ano_competencia}".str_pad($mes_competencia, 2, '0', STR_PAD_LEFT);
      
            foreach($lotacoes as $lotacao){
                $repositorioFuncionario = new RepositorioFuncionario();
                $funcionario = $repositorioFuncionario->getFuncionario($lotacao->getId_funcionario());

                $repositorioLotacaoJornadaDeTrabalho = new RepositorioLotacaoJornadaDeTrabalho();
                $lotacaoJornadaDeTrabalho = $repositorioLotacaoJornadaDeTrabalho->getObjPorIdLotacao($lotacao->getId());
                $repositorioJornadaDeTrabalho = new RepositorioJornadaDeTrabalho();
                $jornadaDeTrabalho = $repositorioJornadaDeTrabalho->getObj($lotacaoJornadaDeTrabalho->getId_jornada_de_trabalho());
                                             
                $_hora_ponto = ($repositorioJornadaDeTrabalho->getCargaPeriodo($jornadaDeTrabalho->getId()))/60;
                
                if(!is_null($funcionario) && !is_null($funcionario->getMatricula()) && $funcionario->getMatricula() > 0 && $funcionario->getMatricula() <= 99999999 ){
                    $meuTexto = $meuTexto . str_pad($funcionario->getMatricula() , 8 , '0' , STR_PAD_LEFT) 
                        .$_ponto_evento
                        .str_pad($_hora_ponto, 6, '0', STR_PAD_LEFT)
                        .$_ano_mes
                        ."\r\n";
                }
            }      

            $fp = fopen("{$nomeArquivo}", "w");
            fwrite($fp, "{$meuTexto}");
            fclose($fp);

            $download = new DownloadTXT();
            $download->download($nomeArquivo);  
        }       
    }
    
    public function importar($request, $response){
        $de = filter_input(INPUT_GET, "tx_de", FILTER_SANITIZE_STRING); 
        $ate = filter_input(INPUT_GET, "tx_ate", FILTER_SANITIZE_STRING);
        
        $repoFuncionario = new RepositorioFuncionario();
        $funcionarioAptos = $repoFuncionario->getFuncionariosComPis();
        $repoRegistro = new RepositorioRegistro();
                
        $cont = 0;
        foreach ($funcionarioAptos as $funcionario){
            $registros = $repoRegistro->getRegistrosPorPis($funcionario->getPis(), $de, $ate);
            foreach ($registros as $r){
                
                $repoRegistroDePonto = new RepositorioRegistroDePonto();
                $registroDePonto = new RegistroDePonto(
                        $r->getId_registro(), $r->getId_servidor(), $funcionario->getId(), $r->getDt_entrada()
                        , $r->getDt_saida(), $r->getSt_ponto_aberto(), $r->getObs(), $r->getNsr_entrada(),
                        $r->getNsr_saida(), $r->getIdrelogio_entrada(), $r->getIdrelogio_saida()
                        );
                if(!$repoRegistroDePonto->verificarInseridoEntrada($r->getId_registro())){                    
                    $retorno = $repoRegistroDePonto->insertEntrada($registroDePonto);
                    $cont++;
                }
                
                if(($r->getDt_entrada() != $r->getDt_saida()) and (strtotime($r->getDt_entrada()) < strtotime($r->getDt_saida())) and $r->getDt_entrada() != '' and !is_null($r->getDt_entrada()) and $r->getDt_saida() != '' and !is_null($r->getDt_saida()) and ($r->getSt_ponto_aberto() == '0') and $r->getDt_saida() != '0000-00-00 00:00:00'){
                    $dateStart = new \DateTime($r->getDt_entrada());
                    $dateNow   = new \DateTime($r->getDt_saida());
 
                    $dateDiff = $dateStart->diff($dateNow);
                    $registroDePonto->setTempo_atividade(($dateDiff->h * 60) + $dateDiff->i);
                }else{
                    $registroDePonto->setTempo_atividade(0);                    
                }
                
                if(!$repoRegistroDePonto->verificarInseridoSaida($r->getId_registro()
                        , $r->getSt_ponto_aberto(), $r->getIdrelogio_saida())){
                    $retorno = $repoRegistroDePonto->insertSaida($registroDePonto);
                    $cont++;
                } 
            }
        }
        
        return $this->response->withHeader("Location", "/ponto/importacao?msg_tipo=success&msg={$cont}");
    }
    
}
