<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioLotacaoRegistraPonto;
use App\Models\LotacaoRegistraPonto;
use App\Repositorios\RepositorioLogUpdate;
use App\Models\LogUpdate;

class RepositorioLotacaoRegistraPonto implements IRepositorioLotacaoRegistraPonto{
    
    public function getObj($id) {
        $sql = " SELECT * FROM tb_lotacao_registra_ponto WHERE id = '{$id}' AND ativo = '1' ";
        $obj = new LotacaoRegistraPonto();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);                        
                $obj->setModificado_por($row->modificado_por);
                $obj->setId($row->id);
                $obj->setId_lotacao($row->id_lotacao);
                $obj->setRegistra_ponto($row->registra_ponto);
            }                
            return $obj;
        }else{
            return new Lotacao();
        }   
    }

    public function insertObj(LotacaoRegistraPonto $obj) {
        $i = 0;
        $tabela = "tb_lotacao_registra_ponto";
        
        $params = array(
                "id_lotacao" =>$obj->getId_lotacao(),
                "registra_ponto" =>$obj->getRegistra_ponto(),
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
}
