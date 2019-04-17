<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioFuncao;
use App\Models\Funcao;
use App\Repositorios\RepositorioLogUpdate;
use App\Models\LogUpdate;

class RepositorioFuncao implements IRepositorioFuncao{
    
    public function getFuncoes() {
        $sql = " SELECT * FROM tb_funcao WHERE ativo = '1' AND id_empresa = '{$_SESSION['id_empresa']}' ";
        $obj = new Funcao();            
        $dados = $obj->selectObj($sql);        
        $array = array();
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){  
                $obj = new Funcao();
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_funcao($row->id_funcao);                
                $obj->setModificado_por($row->modificado_por);            
                $obj->setNome($row->nome);
                $obj->setId_empresa($row->id_empresa);
                array_push($array, $obj);
            }                                        
            return $array;
        }else{
            return array();
        }   
    }

    public function insertFuncao(Funcao $obj) {
        $i = 0;
        $tabela = "tb_funcao";
        
        $params = array(
                "nome" =>$obj->getNome(), 
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
                
        $arrayRetorno = $obj->insert($sql);
        return $arrayRetorno;
    }

    public function getObj($id) {
        $sql = " SELECT * FROM tb_funcao WHERE id_funcao = '{$id}' AND ativo = '1' AND id_empresa = '{$_SESSION['id_empresa']}' ";
        $obj = new Funcao();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_funcao($row->id_funcao);
                $obj->setNome($row->nome);                
                $obj->setModificado_por($row->modificado_por);                
                $obj->setId_empresa($row->id_empresa);
            }                
            return $obj;
        }else{
            return new Funcao();
        }   
    }

    public function updateFuncao(Funcao $atual, Funcao $editada) {
        
        $tabela = "tb_funcao";
        $stringLog = "UPDATE: ";
        $stringSet = "";
                
        if($atual->nome != $editada->nome){
            $stringSet .= ", nome = '{$editada->nome}'";
            $stringLog .= " nome: ". $atual->getNome() ." : ".$editada->getNome() ;
        }
        
        $sql =  " UPDATE {$tabela} SET "
                . " modificado_por = '{$_SESSION['id_usuario']}'"
                . " , dt_modificacao = NOW() "
                . " {$stringSet} "
                . "WHERE id_funcao = '{$atual->getId_funcao()}'; ";            
                                
        $retorno = $atual->update($sql);
        $repositorioLog = new RepositorioLogUpdate();
        if($retorno['msg_tipo']=="success"){
            $novoLog = new LogUpdate($tabela, $atual->getId_funcao(), $stringLog);            
            $ret = $repositorioLog->insertObj($novoLog);
        }else{
            $novoLog = new LogUpdate($tabela, $atual->getId_funcao(), "Error: " . $retorno['msg']);            
            $ret = $repositorioLog->insertObj($novoLog);
        }
        
        return $retorno;
    }

    public function excluirFuncao(Funcao $obj) {
        
        $tabela = "tb_funcao";
        $stringLog = "DELETE: ";
        $stringSet = ", ativo = '0'";
        $stringLog .= " ativo: 1 : 0" ;
               
        $sql =  " UPDATE {$tabela} SET "
                . " modificado_por = '{$_SESSION['id_usuario']}'"
                . " , dt_modificacao = NOW() "
                . " {$stringSet} "
                . "WHERE id_funcao = '{$obj->getId_funcao()}'; ";            
                                
        $retorno = $obj->update($sql);
        $repositorioLog = new RepositorioLogUpdate();
        if($retorno['msg_tipo']=="success"){
            $novoLog = new LogUpdate($tabela, $obj->getId_funcao(), $stringLog);            
            $ret = $repositorioLog->insertObj($novoLog);
        }else{
            $novoLog = new LogUpdate($tabela, $obj->getId_funcao(), "Error: " . $retorno['msg']);            
            $ret = $repositorioLog->insertObj($novoLog);
        }
        
        return $retorno;
    }
    
    public function getArrayBasic(){
        $list = $this->getFuncoes();
        
        $array = array();
        
        $i = 0;
        foreach ($list as $item){
            $array[$i]['id'] = $item->getId_funcao();
            $array[$i]['value'] = $item->getNome();
            $i++;
        }
        
        return $array;
    }
}
