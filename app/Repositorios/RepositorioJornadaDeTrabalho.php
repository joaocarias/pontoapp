<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioJornadaDeTrabalho;
use App\Models\JornadaDeTrabalho;
use App\Repositorios\RepositorioFeriado;

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
                $obj->setCarga_plantao($row->carga_plantao);
            }                
            return $obj;
        }else{
            return new JornadaDeTrabalho();
        }
    }
    
    public function getCargaMensal($id){
        if($id > 0){
            $obj = $this->getObj($id);

            $horaTrabalho = $obj->getHora_trabalho();
            
            $dom = $obj->getDom();
            $qua = $obj->getQua();
            $qui = $obj->getQui();
            $ter = $obj->getTer();
            $seg = $obj->getSeg();
            $sex = $obj->getSex();
            $sab = $obj->getSab();
            
            $numPlatoes = $obj->getNum_platoes();
            $cargaPlantao = $obj->getCarga_plantao();
            
            $ch = ($dom + $sab) + ($seg + $ter + $qua + $qui + $sex) + ($numPlatoes * $cargaPlantao * $horaTrabalho); 
            
            return $ch;    
        }else{
            return "";
        }        
    }
    
    public function getCargaPeriodo($id, $dataInicio = null, $dataFim = null){
        $obj = $this->getObj($id);
        $repoFeriado = new RepositorioFeriado();
                
        $diaInicio = 1;
        $mesInicio = date('m');
        $anoInicio = date('Y');    
        
        if($dataInicio){             
            $dataExplode = explode("-", $dataInicio);   
            list($anoInicio, $mesInicio, $diaInicio) = $dataExplode;
        }
                
        $mesFinal = date('m');
        $anoFinal = date("Y"); 
        $diaFinal = date("t", mktime(0,0,0,$mesFinal,'01',$anoFinal));    
        if($dataFim){
            $dataExplode = explode("-", $dataFim);   
            list($anoFinal, $mesFinal, $diaFinal) = $dataExplode;
        }
        
        $feriados = $repoFeriado->getFeriados($anoInicio."-".$mesInicio."-".$diaInicio, $anoFinal."-".$mesFinal."-".$diaFinal);
                
        $ch = 0;
        for($i = $diaInicio; $i <= $diaFinal; $i++){
            $verificado = $repoFeriado->verificaFeriado($anoFinal.'-'.$mesFinal.'-'.$i, $feriados);
            if(!$verificado){
                $data = date($anoFinal.'-'.$mesFinal.'-'.$i);
                $ch += $this->getCargaDiaDaSemana($obj, $data);    
            }            
        }
        
        return $ch;        
    }
    
    private function getCargaDiaDaSemana(JornadaDeTrabalho $obj, $data){
        $diasemana_numero = date('w', strtotime($data));
        switch ($diasemana_numero){
            case 0:
                return $obj->getDom();
                break;
            case 1:
                return $obj->getSeg();
                break;
            case 2:
                return $obj->getTer();
                break;
            case 3:
                return $obj->getQua();
                break;
            case 4:
                return $obj->getQui();
                break;
            case 5:
                return $obj->getSex();
                break;
            case 6:
                return $obj->getSab();
                break;
            default :
                return 0;
                break;
        }
    }

}
