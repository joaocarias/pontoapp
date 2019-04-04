<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioLotacao;
use App\Models\Lotacao;
use App\Repositorios\RepositorioLogUpdate;
use App\Models\LogUpdate;

class RepositorioLotacao implements IRepositorioLotacao{
    
    public function excluirLotacao(Lotacao $obj) {
        $tabela = "tb_lotacao";
        $stringLog = "DELETE: ";
        $stringSet .= ", ativo = '0'";
        $stringLog .= " ativo: 1 : 0" ;
               
        $sql =  " UPDATE {$tabela} SET "
                . " modificado_por = '{$_SESSION['id_usuario']}'"
                . " , dt_modificacao = NOW() "
                . " {$stringSet} "
                . "WHERE id_feriado = '{$obj->getId_feriado()}'; ";            
                                
        $retorno = $obj->update($sql);
        $repositorioLog = new RepositorioLogUpdate();
        if($retorno['msg_tipo']=="success"){
            $novoLog = new LogUpdate($tabela, $obj->getId(), $stringLog);            
            $ret = $repositorioLog->insertObj($novoLog);
        }else{
            $novoLog = new LogUpdate($tabela, $obj->getId(), "Error: " . $retorno['msg']);            
            $ret = $repositorioLog->insertObj($novoLog);
        }
        
        return $retorno;
    }

    public function getObj($id) {
        $sql = " SELECT * FROM tb_lotacao WHERE id = '{$id}' AND ativo = '1' ";
        $obj = new Lotacao();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);                        
                $obj->setModificado_por($row->modificado_por);
                $obj->setDt_inicio_lotacao($row->dt_inicio_lotacao);
                $obj->setDt_fim_lotacao($row->dt_fim_lotacao);
                $obj->setId($row->id);
                $obj->setId_funcao($id_funcao);
                $obj->setId_funcionario($row->id_funcionario);
                $obj->setId_unidade($row->id_unidade);
            }                
            return $obj;
        }else{
            return new Lotacao();
        }   
    }

    public function insertLotacao(Lotacao $obj) {
        $i = 0;
        $tabela = "tb_lotacao";
        
        $params = array(
                "id_funcionario" =>$obj->getId_funcionario(),
                "id_unidade" =>$obj->getId_unidade(),
                "id_funcao" =>$obj->getId_funcao(),
                "dt_inicio_lotacao" =>$obj->getDt_inicio_lotacao(),
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
    
     public function getLotacaoPorFuncionario($id){
        $sql = " SELECT * FROM tb_lotacao WHERE id_funcionario = '{$id}' AND ativo = '1' order by id asc ";
        $obj = new Lotacao();
        $array = array();
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj = new Lotacao();
                
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);                        
                $obj->setModificado_por($row->modificado_por);
                $obj->setDt_inicio_lotacao($row->dt_inicio_lotacao);
                $obj->setDt_fim_lotacao($row->dt_fim_lotacao);
                $obj->setId($row->id);
                $obj->setId_funcao($row->id_funcao);
                $obj->setId_funcionario($row->id_funcionario);
                $obj->setId_unidade($row->id_unidade);
                array_push($array, $obj);
            }                
            return $array;
        }else{
           return array();
        }   
    }

//    public function updateLotacao(Lotacaco $atual, Lotacao $editado) {
//        $tabela = "tb_lotacao";
//        $stringLog = "UPDATE: ";
//        $stringSet = "";
//                
//        if($atual->nome != $editado->nome){
//            $stringSet .= ", nome = '{$editado->getNome()}'";
//            $stringLog .= " nome: ". $atual->getNome() ." : ".$editado->getNome() ;
//        }
//        
//        if($atual->dt_feriado != $editado->getDt_feriado()){
//            $stringSet .= ", dt_feriado = '{$editado->getDt_feriado()}'";
//            $stringLog .= " dt_feriado: ". $atual->getDt_feriado() ." : ".$editado->getDt_feriado() ;
//        }
//        
//        $sql =  " UPDATE {$tabela} SET "
//                . " modificado_por = '{$_SESSION['id_usuario']}'"
//                . " , dt_modificacao = NOW() "
//                . " {$stringSet} "
//                . "WHERE id_feriado = '{$atual->getId_feriado()}'; ";            
//                                
//        $retorno = $atual->update($sql);
//        $repositorioLog = new RepositorioLogUpdate();
//        if($retorno['msg_tipo']=="success"){
//            $novoLog = new LogUpdate($tabela, $atual->getId_feriado(), $stringLog);            
//            $ret = $repositorioLog->insertObj($novoLog);
//        }else{
//            $novoLog = new LogUpdate($tabela, $atual->getId_feriado(), "Error: " . $retorno['msg']);            
//            $ret = $repositorioLog->insertObj($novoLog);
//        }
//        
//        return $retorno;
//    }

    public function getArrayBasic() {
        
    }

    public function getLotacaoPorUnidade($id) {
        $sql = " SELECT * FROM tb_lotacao WHERE id_unidade = '{$id}' AND ativo = '1' order by id asc ";
        $obj = new Lotacao();
        $array = array();
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj = new Lotacao();
                
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);                        
                $obj->setModificado_por($row->modificado_por);
                $obj->setDt_inicio_lotacao($row->dt_inicio_lotacao);
                $obj->setDt_fim_lotacao($row->dt_fim_lotacao);
                $obj->setId($row->id);
                $obj->setId_funcao($row->id_funcao);
                $obj->setId_funcionario($row->id_funcionario);
                $obj->setId_unidade($row->id_unidade);
                array_push($array, $obj);
            }                
            return $array;
        }else{
           return array();
        }
    }

}
