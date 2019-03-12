<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioUnidade;
use App\Models\Unidade;
use App\Repositorios\RepositorioLogUpdate;
use App\Models\LogUpdate;

class RepositorioUnidade implements IRepositorioUnidade{
    
    public function getUnidades() {
        $sql = " SELECT * FROM tb_unidade WHERE ativo = '1' ";
        $obj = new Unidade();            
        $dados = $obj->selectObj($sql);        
        $array = array();
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){  
                $obj = new Unidade();
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_unidade($row->id_unidade);                
                $obj->setModificado_por($row->modificado_por);            
                $obj->setNome($row->nome);
                array_push($array, $obj);
            }                                        
            return $array;
        }else{
            return array();
        }   
    }

    public function insertUnidade(Unidade $unidade) {
        $i = 0;
        $tabela = "tb_unidade";
        
        $params = array(
                "nome" =>$unidade->getNome(), 
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
                
        $arrayRetorno = $unidade->insert($sql);
        return $arrayRetorno;
    }

    public function getObj($id_unidade) {
         $sql = " SELECT * FROM tb_unidade WHERE id_unidade = '{$id_unidade}' AND ativo = '1' ";
        $obj = new Unidade();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_unidade($row->id_unidade);
                $obj->setNome($row->nome);                
                $obj->setModificado_por($row->modificado_por);                
            }                
            return $obj;
        }else{
            return new Unidade();
        }   
    }

    public function updateUnidade(Unidade $unidadeAtual, Unidade $unidadeEditada) {
        $tabela = "tb_unidade";
        $stringLog = "UPDATE: ";
        $stringSet = "";
                
        if($unidadeAtual->nome != $unidadeEditada->nome){
            $stringSet .= ", nome = '{$unidadeEditada->nome}'";
            $stringLog .= " nome: ". $unidadeAtual->getNome() ." : ".$unidadeEditada->getNome() ;
        }
        
        $sql =  " UPDATE {$tabela} SET "
                . " modificado_por = '{$_SESSION['id_usuario']}'"
                . " , dt_modificacao = NOW() "
                . " {$stringSet} "
                . "WHERE id_unidade = '{$unidadeAtual->getId_unidade()}'; ";            
                                
        $retorno = $unidadeAtual->update($sql);
        $repositorioLog = new RepositorioLogUpdate();
        if($retorno['msg_tipo']=="success"){
            $novoLog = new LogUpdate($tabela, $unidadeAtual->getId_unidade(), $stringLog);            
            $ret = $repositorioLog->insertObj($novoLog);
        }else{
            $novoLog = new LogUpdate($tabela, $unidadeAtual->getId_unidade(), "Error: " . $retorno['msg']);            
            $ret = $repositorioLog->insertObj($novoLog);
        }
        
        return $retorno;
    }

    public function excluirUnidade(Unidade $unidade) {
        $tabela = "tb_unidade";
        $stringLog = "DELETE: ";
        $stringSet .= ", ativo = '0'";
        $stringLog .= " ativo: 1 : 0" ;
               
        $sql =  " UPDATE {$tabela} SET "
                . " modificado_por = '{$_SESSION['id_usuario']}'"
                . " , dt_modificacao = NOW() "
                . " {$stringSet} "
                . "WHERE id_unidade = '{$unidade->getId_unidade()}'; ";            
                                
        $retorno = $unidade->update($sql);
        $repositorioLog = new RepositorioLogUpdate();
        if($retorno['msg_tipo']=="success"){
            $novoLog = new LogUpdate($tabela, $unidade->getId_unidade(), $stringLog);            
            $ret = $repositorioLog->insertObj($novoLog);
        }else{
            $novoLog = new LogUpdate($tabela, $unidade->getId_unidade(), "Error: " . $retorno['msg']);            
            $ret = $repositorioLog->insertObj($novoLog);
        }
        
        return $retorno;
    }

}
