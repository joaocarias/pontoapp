<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioLotacaoJornadaDeTrabalho;
use App\Models\LotacaoJornadaDeTrabalho;

class RepositorioLotacaoJornadaDeTrabalho implements IRepositorioLotacaoJornadaDeTrabalho{
    
    public function insertObj(LotacaoJornadaDeTrabalho $obj) {
        $i = 0;
        $tabela = "tb_lotacao_jornada_de_trabalho";
        
        $params = array(
                "id_lotacao" =>$obj->getId_lotacao(),
                "id_jornada_de_trabalho" =>$obj->getId_jornada_de_trabalho(),                
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

    public function getObjPorIdLotacao($id): LotacaoJornadaDeTrabalho {
        $sql = " SELECT * FROM tb_lotacao_jornada_de_trabalho WHERE id_lotacao = '{$id}' AND ativo = '1'  ";
        $obj = new LotacaoJornadaDeTrabalho();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId($row->id);
                $obj->setId_jornada_de_trabalho($row->id_jornada_de_trabalho);                
                $obj->setModificado_por($row->modificado_por);                
                $obj->setId_lotacao($row->id_lotacao);
            }                
            return $obj;
        }else{
            return new LotacaoJornadaDeTrabalho();
        }
    }

}
