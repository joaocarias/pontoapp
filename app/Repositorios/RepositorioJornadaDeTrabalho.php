<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioJornadaDeTrabalho;
use App\Models\JornadaDeTrabalho;

class RepositorioJornadaDeTrabalho implements IRepositorioJornadaDeTrabalho{
    
    public function getJornadaPorTipo($idTipo) {
        $sql = " SELECT * FROM tb_jornada_de_trabalho "
                . " WHERE id_tipo_jornada_de_trabalho = '{$idTipo}' and id_empresa = '{$_SESSION['id_empresa']}' AND ativo = '1' "
                . " ORDER BY descricao ASC ";
        $obj = new JornadaDeTrabalho();            
        $dados = $obj->selectObj($sql);        
        $array = array();
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){  
                $obj = new JornadaDeTrabalho();
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setModificado_por($row->modificado_por);            
                
                $obj->setDescricao($row->descricao);
                $obj->setDom($row->dom);
                $obj->setId($row->id);
                $obj->setId_empresa($row->id_empresa);
                $obj->setId_tipo_jornada_de_trabalho($row->id_tipo_jornada_de_trabalho);
                $obj->setNum_platoes($row->num_plantoes);
                $obj->setQua($row->qua);
                $obj->setQui($row->qui);
                $obj->setSab($row->sab);
                $obj->setSeg($row->seg);
                $obj->setSex($row->sex);
                $obj->setTer($row->ter);
                $obj->setHora_trabalho($row->hora_trabalho);
                                
                array_push($array, $obj);
            }                                        
            return $array;
        }else{
            return array();
        }
    }
    
    public function getArrayBasic($idTipo = null) {
        $list = $this->getJornadaPorTipo($idTipo);
        
        $array = array();
        
        $i = 0;
        foreach ($list as $item){
            $array[$i]['id'] = $item->getId();
            $array[$i]['value'] = $item->getDescricao();
            $i++;
        }
        
        return $array;
    }

    public function getObj($id): JornadaDeTrabalho {
        $sql = " SELECT * FROM tb_jornada_de_trabalho WHERE id = '{$id}' AND ativo = '1' AND id_empresa = '{$_SESSION['id_empresa']}' ";         
        $obj = new JornadaDeTrabalho();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setModificado_por($row->modificado_por);            
                
                $obj->setDescricao($row->descricao);
                $obj->setDom($row->dom);
                $obj->setId($row->id);
                $obj->setId_empresa($row->id_empresa);
                $obj->setId_tipo_jornada_de_trabalho($row->id_tipo_jornada_de_trabalho);
                $obj->setNum_platoes($row->num_plantoes);
                $obj->setQua($row->qua);
                $obj->setQui($row->qui);
                $obj->setSab($row->sab);
                $obj->setSeg($row->seg);
                $obj->setSex($row->sex);
                $obj->setTer($row->ter);
                $obj->setHora_trabalho($row->hora_trabalho);
            }                
            return $obj;
        }else{
            return new JornadaDeTrabalho();
        }
    }
    
    public function getCargaMensal($id){
        return 0;
    }

}
