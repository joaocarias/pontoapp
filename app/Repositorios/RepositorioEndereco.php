<?php

namespace App\Repositorios;
use App\Models\Endereco;
use App\Interfaces\IRepositorioEndereco;

class RepositorioEndereco implements IRepositorioEndereco{
    
    public function insertObj(Endereco $endereco) {
        $i = 0;
        $tabela = "tb_endereco";
        
        $params = array(
                "logradouro" =>$endereco->getLogradouro(), 
                "numero" => $endereco->getNumero(),
                "complemento" => $endereco->getComplemento(),
                "cep" => $endereco->getCep(),
                "bairro" => $endereco->getBairro(),
                "cidade" => $endereco->getCidade(),
                "uf" => $endereco->getUf(), 
                "telefone" => $endereco->getTelefone(),
                "celular"  => $endereco->getCelular(),
                "email" => $endereco->getEmail(),
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
        
        $arrayRetorno = $endereco->insert($sql);
        return $arrayRetorno;
    }

    public function getEndereco($id): Endereco {
        $sql = " SELECT * FROM tb_endereco WHERE id_endereco = '{$id}' AND ativo = '1' ";
        $obj = new Endereco();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_endereco($row->id_endereco);                
                $obj->setModificado_por($row->modificado_por);
                $obj->setBairro($row->bairro);
                $obj->setCelular($row->celular);
                $obj->setCep($row->cep);
                $obj->setCidade($row->cidade);
                $obj->setComplemento($row->complemento);
                $obj->setEmail($row->email);
                $obj->setLogradouro($row->logradouro);
                $obj->setNumero($row->numero);
                $obj->setTelefone($row->telefone);
                $obj->setUf($row->uf);
            }                
            return $obj;
        }else{
            return new Empresa();
        }   
    }

}
