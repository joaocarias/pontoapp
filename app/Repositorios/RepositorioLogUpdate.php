<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioUpdate;
use App\Models\LogUpdate;

class RepositorioLogUpdate implements IRepositorioUpdate {
    
    public function insertObj(LogUpdate $logUpdate) {
        $tabelaEditada = $logUpdate->getTabela();
        $id_tabela = $logUpdate->getId_tabela();
        $reg_log = $logUpdate->getReg_log();
        
        $tabela = "tb_log_update";
        
            $params = array(
                    "tabela" => $tabelaEditada
                    , "id_tabela" => $id_tabela
                    , "reg_log" => $reg_log
                    , "criado_por" => $_SESSION["id_usuario"]
                );
        
        $i = 0;        
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
        
        $arrayRetorno = $logUpdate->insert($sql);
        return $arrayRetorno;
    }

}
