<?php

namespace App\Controllers;

use Lib\Controller;
use Lib\DownloadTXT;
    
use App\Repositorios\RepositorioUnidade;
use App\Repositorios\RepositorioLotacao;
use App\Repositorios\RepositorioFuncionario;    

use App\Models\Unidade;
use App\Models\Lotacao;
use App\Models\Funcionario;

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

        if($idUnidade){       
            $nomeArquivo = $idUnidade.".txt";
            $meuTexto = "";  
    
            $repositorioUnidade = new RepositorioUnidade();
            $unidade = $repositorioUnidade->getObj($idUnidade);

            $repositorioLotacao = new RepositorioLotacao();
            $lotacoes = $repositorioLotacao->getLotacaoPorUnidade($unidade->getId_unidade());

            $_ponto_evento = "2025";
            $_hora_ponto = "000000";
            $_ano_mes = "201904";
      
            foreach($lotacoes as $lotacao){
                $repositorioFuncionario = new RepositorioFuncionario();
                $funcionario = $repositorioFuncionario->getFuncionario($lotacao->getId_funcionario());

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
