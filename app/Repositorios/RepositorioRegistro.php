<?php

namespace App\Repositorios;
use App\Models\Dimensionamento\Registro;
use App\Interfaces\IRepositorioRegistro;
use Lib\Auxiliar;

class RepositorioRegistro implements IRepositorioRegistro{    
    public function getRegistrosPorPis($pis, $de, $ate) {
        $sql = " select r.id_registro as id_registro, r.id_servidor as id_servidor, r.dt_entrada as dt_entrada 
                , r.dt_saida as dt_saida, r.st_registro as st_registro, r.st_ponto_aberto as st_ponto_aberto
                , r.obs as obs, r.registro_justificado as registro_justificado, r.horas_justificadas as horas_justificadas, r.justificativa_aprovada as justificativa_aprovada
                , r.data_ultima_atualizacao as data_ultima_atualizacao, r.atualizado_por as atualizado_por, r.nsr_entrada as nsr_entrada
                , r.nsr_saida as nsr_saida, r.idrelogio_entrada as idrelogio_entrada, r.idrelogio_saida as idrelogio_saida, r.trabalhada as trabalhada 
            from registro as r 
            inner join servidor as s on s.id_servidor = r.id_servidor 
            where s.PIS = '{$pis}' and r.dt_entrada between '".$de."' and '".$ate."' and  registro_justificado = '0' ";
        $obj = new Registro();            
        $dados = $obj->selectObj($sql);        
        $array = array();
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){  
                $obj = new Registro();
                $obj->setAtualizado_por($row->atualizado_por);
                $obj->setData_ultima_atualizacao($row->data_ultima_atualizacao);
                $obj->setDt_entrada($row->dt_entrada);
                $obj->setDt_saida($row->dt_saida);
                $obj->setHoras_justificadas($row->horas_justificadas);
                $obj->setId_registro($row->id_registro);
                $obj->setId_servidor($row->id_servidor);
                $obj->setIdrelogio_entrada($row->idrelogio_entrada);
                $obj->setIdrelogio_saida($row->idrelogio_saida);
                $obj->setObs($row->obs);
                $obj->setRegistro_justificado($row->registro_justificado);
                $obj->setSt_ponto_aberto($row->st_ponto_aberto);
                $obj->setSt_registro($row->st_registro);
                $obj->setTrabalhada($row->trabalhada);
                array_push($array, $obj);
            }                                        
            return $array;
        }else{
            return array();
        }
    }
}
