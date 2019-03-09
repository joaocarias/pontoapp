<?php

namespace App\Repositorios;

use App\Interfaces\IRepositorioLogAcesso;
use App\Models\LogAcesso; 

class RepositorioLogAcesso implements IRepositorioLogAcesso {
    
    public function insertObj(LogAcesso $logAcesso) {
        $id_usuario = $logAcesso->getId_usuario();
        $login = $logAcesso->getLogin();
        $situacao = $logAcesso->getAcesso();
        
        $tabela = "tb_log_acesso";
        if(is_null($id_usuario)){
            $params = array(
                    "login" => $login
                    , "acesso" => $situacao
                );
        }else{
            $params = array("id_usuario" => $id_usuario
                    , "login" => $login
                    , "acesso" => $situacao
                );
        }
        
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
        
        $arrayRetorno = $logAcesso->insert($sql);
        return $arrayRetorno;
    }

}
