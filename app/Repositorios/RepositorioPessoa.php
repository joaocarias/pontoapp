<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioPessoa;
use \App\Models\Pessoa;

class RepositorioPessoa implements IRepositorioPessoa {
    
    public function getPessoa($id): Pessoa {
        $sql = " SELECT * FROM tb_pessoa WHERE id_pessoa = '{$id}' AND ativo = '1' ";
        $obj = new Pessoa();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_pessoa($row->id_pessoa);                
                $obj->setModificado_por($row->modificado_por);
                $obj->setApelido($row->apelido);
                $obj->setCpf($row->cpf);
                $obj->setData_de_nascimento($row->data_de_nascimento);
                $obj->setId_empresa($row->id_empresa);
                $obj->setId_endereco($row->id_endereco);
                $obj->setNome($row->nome);
                $obj->setRg($row->rg);
            }                
            return $obj;
        }else{
            return new Pessoa();
        }   
    }
    
    public function setEmpresa($idPessoa, $idEmpresa) {
        $sql = " UPDATE tb_pessoa SET id_empresa = '{$idEmpresa}' WHERE id_pessoa = '{$idPessoa}'";
        $obj = new Pessoa();
        $retorno = $obj->update($sql);
        return $retorno;
    }
}
