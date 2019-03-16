<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioPDN;
use App\Models\PDN;

class RepositorioPDN implements IRepositorioPDN {
    public function getPDNs() {
        $sql = " SELECT * FROM tb_pdn WHERE ativo = '1' ";
        $obj = new PDN();            
        $dados = $obj->selectObj($sql);        
        $array = array();
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){  
                $obj = new PDN();
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId($row->id);                
                $obj->setModificado_por($row->modificado_por);            
                $obj->setCodigo($row->codigo);
                $obj->setDescricao($row->descricao);
                array_push($array, $obj);
            }                                        
            return $array;
        }else{
            return array();
        }
    }

}
