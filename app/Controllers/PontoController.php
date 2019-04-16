<?php

namespace App\Controllers;

use Lib\Controller;
use Lib\DownloadTXT;
    
use App\Repositorios\RepositorioUnidade;
use App\Repositorios\RepositorioLotacao;
use App\Repositorios\RepositorioFuncionario;    
use App\Repositorios\RepositorioJornadaDeTrabalho;
use App\Repositorios\RepositorioLotacaoJornadaDeTrabalho;

use App\Models\Unidade;
use App\Models\Lotacao;
use App\Models\Funcionario;
use App\Models\LotacaoJornadaDeTrabalho;
use App\Models\JornadaDeTrabalho;

class PontoController extends Controller {
    public function index($request, $response){
       $controller = 'Ponto';
       $action = 'index';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
    }
    
    public function exportacao($request, $response){
       $controller = 'Ponto';
       $action = 'exportacao';
       
       $vars['action'] = $action;
       $vars['controller'] = $controller;      
       $_SESSION['controller'] = $controller;
       $_SESSION['action'] = $action;     
       
       return $this->view->render($response, 'layout_dashboard.php', $vars);
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
}
