<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioServidor;
use App\Models\Dimensionamento\Servidor;

class RepositorioServidor implements IRepositorioServidor {
    
    public function getServidorCPF($cpf): Servidor {
        $sql = " SELECT * FROM servidor WHERE cpf_servidor = '{$cpf}' AND ativo = '1' ";
        $obj = new Servidor();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAlcunha_servidor($row->alcunha_servidor);
                $obj->setCpf_servidor($row->cpf_servidor);
                $obj->setDt_nascimento_servidor($row->dt_nascimento_servidor);
                $obj->setEmail($row->email);
                $obj->setNome_servidor($row->nome_servidor);
                $obj->setPis($row->PIS);
                $obj->setSexo($row->sexo_servidor);
                $obj->setTelefone($row->telefone);
                
            }                
            return $obj;
        }else{
            return new Servidor();
        }
    }

}
