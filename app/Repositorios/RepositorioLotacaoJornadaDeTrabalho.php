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

}
