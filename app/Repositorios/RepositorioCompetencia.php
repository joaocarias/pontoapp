<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioCompetencia;
use App\Models\Competencia;

class RepositorioCompetencia implements IRepositorioCompetencia{
    
    public function getCompetencias() {
        $sql = " SELECT * FROM tb_competencia WHERE ativo = '1' AND id_empresa = '{$_SESSION['id_empresa']}' order by ano, mes asc ";
        $obj = new Competencia();            
        $dados = $obj->selectObj($sql);        
        $array = array();
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){  
                $obj = new Competencia();
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId($row->id);                
                $obj->setModificado_por($row->modificado_por);            
                $obj->setMes($row->mes);
                $obj->setAno($row->ano);
                $obj->setId_empresa($row->id_empresa);
                array_push($array, $obj);
            }                                        
            return $array;
        }else{
            return array();
        }   
    }

    public function getObj($id): Competencia {
        $sql = " SELECT * FROM tb_competencia WHERE id = '{$id}' AND ativo = '1' AND id_empresa = '{$_SESSION['id_empresa']}' ";
        $obj = new Competencia();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId($row->id);                
                $obj->setModificado_por($row->modificado_por);            
                $obj->setMes($row->mes);
                $obj->setAno($row->ano);
                $obj->setId_empresa($row->id_empresa);
            }                
            return $obj;
        }else{
            return new Competencia();
        }   
    }

    public function getArrayBasic() {
        $list = $this->getCompetencias();
        
        $array = array();
        
        $i = 0;
        foreach ($list as $item){
            $array[$i]['id'] = $item->getId();
            $array[$i]['value'] = str_pad($item->getMes() , 2 , '0' , STR_PAD_LEFT) . "/" . $item->getAno();
            $i++;
        }
        
        return $array;
    }
}
