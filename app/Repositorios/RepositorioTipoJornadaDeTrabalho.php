<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioTipoJornadaDeTrabalho;
use App\Models\TipoJornadaDeTrabalho;

class RepositorioTipoJornadaDeTrabalho implements IRepositorioTipoJornadaDeTrabalho {
  
    public function getObj($id): TipoJornadaDeTrabalho {
        $sql = " SELECT * FROM tb_tipo_jornada_de_trabalho WHERE id = '{$id}' AND ativo = '1' AND id_empresa = '{$_SESSION['id_empresa']}' ";
        $obj = new TipoJornadaDeTrabalho();            
        $dados = $obj->selectObj($sql);        
               
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){  
               
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId($row->id);                
                $obj->setModificado_por($row->modificado_por);            
                $obj->setNome($row->nome);
                $obj->setId_empresa($row->id_empresa);
               
            }                                        
            return $obj;
        }else{
            return new TipoJornadaDeTrabalho();
        }   
    }

    public function getArrayBasic() {
        $list = $this->getTipoJornadasDeTrabalho();
        
        $array = array();
        
        $i = 0;
        foreach ($list as $item){
            $array[$i]['id'] = $item->getId();
            $array[$i]['value'] = $item->getNome();
            $i++;
        }
        
        return $array;
    }

    public function getTipoJornadasDeTrabalho() {
        $sql = " SELECT * FROM tb_tipo_jornada_de_trabalho WHERE ativo = '1' AND id_empresa = '{$_SESSION['id_empresa']}' ";
        $obj = new TipoJornadaDeTrabalho();            
        $dados = $obj->selectObj($sql);   
        $array = Array();
               
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){  
                $obj = new TipoJornadaDeTrabalho();
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);                          
                $obj->setModificado_por($row->modificado_por);            
                $obj->setNome($row->nome);
                $obj->setId_empresa($row->id_empresa);
                $obj->setId($row->id);
                array_push($array, $obj);
            }                                        
            return $array;
        }else{
            return Array();
        }   
    }
}
