<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioFeriado;
use App\Models\Feriado;
use App\Repositorios\RepositorioLogUpdate;
use App\Models\LogUpdate;

class RepositorioFeriado implements IRepositorioFeriado{
    
    public function excluirFeriado(Feriado $feriado) {
        $tabela = "tb_feriado";
        $stringLog = "DELETE: ";
        $stringSet .= ", ativo = '0'";
        $stringLog .= " ativo: 1 : 0" ;
               
        $sql =  " UPDATE {$tabela} SET "
                . " modificado_por = '{$_SESSION['id_usuario']}'"
                . " , dt_modificacao = NOW() "
                . " {$stringSet} "
                . "WHERE id_feriado = '{$feriado->getId_feriado()}'; ";            
                                
        $retorno = $feriado->update($sql);
        $repositorioLog = new RepositorioLogUpdate();
        if($retorno['msg_tipo']=="success"){
            $novoLog = new LogUpdate($tabela, $feriado->getId_feriado(), $stringLog);            
            $ret = $repositorioLog->insertObj($novoLog);
        }else{
            $novoLog = new LogUpdate($tabela, $feriado->getId_feriado(), "Error: " . $retorno['msg']);            
            $ret = $repositorioLog->insertObj($novoLog);
        }
        
        return $retorno;
    }

    public function getFeriados($de, $ate) {
        $sql = " SELECT * FROM tb_feriado "
                . "WHERE dt_feriado between '{$de}' AND '{$ate}' AND ativo = '1' "
                . " ORDER BY dt_feriado ASC ";
        $obj = new Feriado();            
        $dados = $obj->selectObj($sql);        
        $array = array();
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){  
                $obj = new Feriado();
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_feriado($row->id_feriado);                
                $obj->setModificado_por($row->modificado_por);            
                $obj->setNome($row->nome);
                $obj->setDt_feriado($row->dt_feriado);
                array_push($array, $obj);
            }                                        
            return $array;
        }else{
            return array();
        }   
    }

    public function getObj($id) {
        $sql = " SELECT * FROM tb_feriado WHERE id_feriado = '{$id}' AND ativo = '1' ";
        $obj = new Feriado();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_feriado($row->id_feriado);
                $obj->setDt_feriado($row->dt_feriado);
                $obj->setNome($row->nome);                
                $obj->setModificado_por($row->modificado_por);   
                
            }                
            return $obj;
        }else{
            return new Feriado();
        }   
    }

    public function insertFeriado(Feriado $obj) {
        $i = 0;
        $tabela = "tb_feriado";
        
        $params = array(
                "nome" =>$obj->getNome(),
                "dt_feriado" => $obj->getDt_feriado(),
                "criado_por" => $_SESSION["id_usuario"]
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
                
        $arrayRetorno = $obj->insert($sql);
        return $arrayRetorno;
    }

    public function updateFeriado(Feriado $atual, Feriado $editado) {
        $tabela = "tb_feriado";
        $stringLog = "UPDATE: ";
        $stringSet = "";
                
        if($atual->nome != $editado->nome){
            $stringSet .= ", nome = '{$editado->getNome()}'";
            $stringLog .= " nome: ". $atual->getNome() ." : ".$editado->getNome() ;
        }
        
        if($atual->dt_feriado != $editado->getDt_feriado()){
            $stringSet .= ", dt_feriado = '{$editado->getDt_feriado()}'";
            $stringLog .= " dt_feriado: ". $atual->getDt_feriado() ." : ".$editado->getDt_feriado() ;
        }
        
        $sql =  " UPDATE {$tabela} SET "
                . " modificado_por = '{$_SESSION['id_usuario']}'"
                . " , dt_modificacao = NOW() "
                . " {$stringSet} "
                . "WHERE id_feriado = '{$atual->getId_feriado()}'; ";            
                                
        $retorno = $atual->update($sql);
        $repositorioLog = new RepositorioLogUpdate();
        if($retorno['msg_tipo']=="success"){
            $novoLog = new LogUpdate($tabela, $atual->getId_feriado(), $stringLog);            
            $ret = $repositorioLog->insertObj($novoLog);
        }else{
            $novoLog = new LogUpdate($tabela, $atual->getId_feriado(), "Error: " . $retorno['msg']);            
            $ret = $repositorioLog->insertObj($novoLog);
        }
        
        return $retorno;
    }

    public function verificaFeriado($data, $arrayFeriados) : bool{        
        foreach ($arrayFeriados as $feriado){
           if($feriado->getDt_feriado() == $data){
               return true;
           }
        }        
        return false;
    }
}
