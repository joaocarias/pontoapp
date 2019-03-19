<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioFuncionario;
use App\Models\Funcionario;

class RepositorioFuncionario implements IRepositorioFuncionario {
    
    public function insertFuncionario(Funcionario $obj) {
        $i = 0;
        $tabela = "tb_funcionario";
        
        $params = array(
                "pis" =>$obj->getPis(),
                "id_pessoa" =>$obj->getId_pessoa(),
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

    public function getFuncionarioPorPIS($pis): Funcionario {
        $sql = " SELECT * FROM tb_funcionario WHERE pis = '{$pis}' AND ativo = '1' ";
        $obj = new Funcionario();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_pessoa($row->id_pessoa);                
                $obj->setModificado_por($row->modificado_por);
                $obj->setId($row->id);
                $obj->setPis($row->pis);                
            }                
            return $obj;
        }else{
            return new Funcionario();
        }
    }
}
