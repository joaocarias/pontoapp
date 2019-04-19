<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioRegistroDePonto;
use App\Models\RegistroDePonto;

class RepositorioRegistroDePonto implements IRepositorioRegistroDePonto {
    
    public function insert(RegistroDePonto $obj) {
        $i = 0;
        $tabela = "tb_registro_de_ponto";
        
        $params = array(
                "id_registro" => $obj->getId_registro() == null ? 0 : $obj->getId_registro(),
                "id_servidor" => $obj->getId_servidor(),
                "id_funcionario" => $obj->getId_funcionario(),                
                "dt_entrada" => $obj->getDt_entrada(),
                "dt_saida" => $obj->getDt_saida(),
                
                
                "nsr_entrada" => $obj->getNsr_entrada(),
                "nsr_saida" => $obj->getNsr_saida(),
                "id_relogio_entrada" => $obj->getId_relogio_entrada(),
                "id_relogio_saida" => $obj->getId_relogio_saida(),            
                "criado_por" => $_SESSION["id_usuario"],
                "id_empresa" => $_SESSION['id_empresa']
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
