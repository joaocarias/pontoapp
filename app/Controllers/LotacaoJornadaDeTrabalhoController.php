<?php

namespace App\Controllers;
use Lib\Controller;
use App\Models\LotacaoJornadaDeTrabalho;
use App\Repositorios\RepositorioLotacaoJornadaDeTrabalho;


class LotacaoJornadaDeTrabalhoController extends Controller {
    public function cadastrar($request, $response){       
        $id_jornada_de_trabalho = filter_input(INPUT_POST, "tx_id_jornada_de_trabalho", FILTER_SANITIZE_STRING);
        $id_lotacao = filter_input(INPUT_POST, "id_lotacao", FILTER_SANITIZE_STRING);
        $id_funcionario = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);
        
        $btn_salvar = filter_input(INPUT_POST, "btn_salvar", FILTER_SANITIZE_STRING);
        
        if($btn_salvar){
            $obj = new LotacaoJornadaDeTrabalho($id_lotacao, $id_jornada_de_trabalho);
            $repositorio = new RepositorioLotacaoJornadaDeTrabalho();
            $retorno = $repositorio->insertObj($obj);
            
            if(!is_null($retorno) && $retorno > 0){
                return $this->response->withHeader('Location', '/funcionario/detalhes?id='.$id_funcionario);            
            }else{
                return $this->response->withHeader('Location', '/funcionario/detalhes?id='.$id_funcionario.'&r=error');                
            }    
        }else{
            return $this->response->withHeader('Location', '/funcionario/detalhes?id='.$id_funcionario.'&r=error');
        }
    }
}
