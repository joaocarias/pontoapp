<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioRegistroDePonto;
use App\Models\RegistroDePonto;

class RepositorioRegistroDePonto implements IRepositorioRegistroDePonto {
    
    public function insertEntrada(RegistroDePonto $obj) {
        $i = 0;
        $tabela = "tb_registro_de_ponto";
        
        $params = array(
                "id_registro" => $obj->getId_registro(),
                "id_servidor" => $obj->getId_servidor(),
                "id_funcionario" => $obj->getId_funcionario(),                
                "dt_entrada" => $obj->getDt_entrada(),
                "dt_saida" => $obj->getDt_saida() == "" ? null : $obj->getDt_saida() ,
                "ponto_em_aberto" => $obj->getPonto_em_aberto(),
                "tempo_atividade" => $obj->getTempo_atividade(),
                "nsr_entrada" => $obj->getNsr_entrada(),
                "nsr_saida" => $obj->getNsr_saida(),
                "obs" => $obj->getObs(),
                "id_relogio_entrada" => $obj->getId_relogio_entrada(),
                "id_relogio_saida" => $obj->getId_relogio_saida() == "" ? null : $obj->getId_relogio_saida(),            
                "criado_por" => $_SESSION["id_usuario"],
                "id_empresa" => $_SESSION['id_empresa']
            );
        
        $colunas = "";        
        $valores = "";
        foreach ($params as $coluna => $valor){
            if($i == 0){
                $colunas .= "{$coluna}";
                $valores .= "'{$valor}'";
            }else{
                $colunas .= ", {$coluna}";
                $valores .= ", '{$valor}'";
            }
            $i++;
        }
        
        $sql = " INSERT INTO {$tabela} ( {$colunas} ) "
        . "VALUES ({$valores}); ";
                
        var_dump($sql);
        
        $arrayRetorno = $obj->insert($sql);
        return $arrayRetorno;
    }
    
    public function insertSaida(RegistroDePonto $obj) {        
        $tabela = "tb_registro_de_ponto";        
        $stringSet = "";
        
        $stringSet .= " dt_saida = '{$obj->getDt_saida()}' ";
        $stringSet .= ", tempo_atividade = '{$obj->getTempo_atividade()}' ";
        $stringSet .= ", ponto_em_aberto = '{$obj->getPonto_em_aberto()}' ";
        $stringSet .= is_null($obj->getDt_saida()) || $obj->getDt_saida() == '' ? "" : ", dt_saida = '{$obj->getDt_saida()}' ";
        $stringSet .= ", nsr_saida = '{$obj->getNsr_saida()}' ";
        $stringSet .= is_null($obj->getId_relogio_saida()) || $obj->getId_relogio_saida() == '' ? "" : ", id_relogio_saida = '{$obj->getId_relogio_saida()}' ";
        
        $sql =  " UPDATE {$tabela} SET "                
                . " {$stringSet} "
                . " WHERE id_registro = '{$obj->getId_registro()}' and ativo = '1'; ";            
                                
        $retorno = $obj->update($sql);                
        return $retorno;
    }

    public function verificarInseridoEntrada($idRegistro) {
        $sql = "select count(*) as cont from tb_registro_de_ponto
                    where id_registro = '{$idRegistro}' and ativo = '1';";
           
        $obj = new RegistroDePonto();             
        $dados = $obj->selectObj($sql);        
        
        $v = false;
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                if($row->cont > 0)
                $v = true;                
            }
        }
        
        return $v;            
    }

    public function verificarInseridoSaida($idRegistro, $pontoAberto, $idRelogioSaida) {
        $sql = "select count(*) as cont from tb_registro_de_ponto
                    where id_registro = '{$idRegistro}' and ativo = '1' and ponto_em_aberto = '{$pontoAberto}'"
                    . " and id_relogio_saida = '{$idRelogioSaida}' ;";
           
        $obj = new RegistroDePonto();             
        $dados = $obj->selectObj($sql);        
        
        $v = false;
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                if($row->cont > 0)
                $v = true;                
            }
        }
        
        return $v;
    }


    public function getCargaTrabalhado($id_funcionario, $inicio, $fim) {
        $sql = " select sum(tempo_atividade) as carga_trabalhada 
                from tb_registro_de_ponto 
                where id_funcionario = '{$id_funcionario}' and ativo = '1' and dt_entrada between '{$inicio}' and '{$fim}' ;" ;
                
        $obj = new RegistroDePonto();             
        $dados = $obj->selectObj($sql);        
        
        $cargaTrabalhada = 0;
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                if($row->carga_trabalhada)
                $cargaTrabalhada = $row->carga_trabalhada ;                
            }
        }
        
        return $cargaTrabalhada;
    }

    public function getRegistrosDePonto($id_funcionario, $mes, $ano){
        $sql = "SELECT DAY(dt_entrada) as dia_entrada, MONTH(dt_entrada) as mes_entrada, YEAR(dt_entrada) as ano_entrada,  DATE_FORMAT(dt_entrada, '%H:%i:%S') as hora_entrada,
                   DAY(dt_saida) as dia_saida, MONTH(dt_saida) as mes_saida, YEAR(dt_saida) as ano_saida,  DATE_FORMAT(dt_saida, '%H:%i:%S') as hora_saida,
                   obs, tempo_atividade, ponto_em_aberto
                FROM tb_registro_de_ponto
                where id_funcionario = '{$id_funcionario}' AND MONTH(dt_entrada) = '{$mes}' AND YEAR(dt_entrada) = '{$ano}' ORDER BY id ASC";

        $obj = new RegistroDePonto();
        $dados = $obj->selectObj($sql);

        $batidas = array();

        if($dados["obj"]){
            foreach ($dados["obj"] as $row){
                array_push($batidas, $row);
            }
        }

        return $batidas;

    }

}
