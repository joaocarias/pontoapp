<?php

namespace App\Repositorios;
use App\Models\Endereco;
use App\Interfaces\IRepositorioEndereco;
use App\Repositorios\RepositorioLogUpdate;
use App\Models\LogUpdate;

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
        //return $sql;
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
    
    public function updateObj(Endereco $enderecoAtual, Endereco $enderecoEditado){
        $tabela = "tb_endereco";
        $stringLog = "UPDATE: ";
        $stringSet = "";
                
        if($enderecoAtual->getBairro() != $enderecoEditado->getBairro()){
            $stringSet .= ", bairro = '{$enderecoEditado->getBairro()}'";
            $stringLog .= " bairro: ". $enderecoAtual->getBairro() ." : ".$enderecoEditado->getBairro();
        }
        
        if($enderecoAtual->getCelular() != $enderecoEditado->getCelular()){
            $stringSet .= ", celular = '{$enderecoEditado->getCelular()}'";
            $stringLog .= " celular: ". $enderecoAtual->getCelular() ." : ".$enderecoEditado->getCelular();
        }
        
        if($enderecoAtual->getCep() != $enderecoEditado->getCep()){
            $stringSet .= ", cep = '{$enderecoEditado->getCep()}'";
            $stringLog .= " cep: ". $enderecoAtual->getCep() ." : ".$enderecoEditado->getCep();
        }
                
        if($enderecoAtual->getCidade() != $enderecoEditado->getCidade()){
            $stringSet .= ", cidade = '{$enderecoEditado->getCidade()}'";
            $stringLog .= " cidade: ". $enderecoAtual->getCidade() ." : ".$enderecoEditado->getCidade();
        }
                
        if($enderecoAtual->getCidade() != $enderecoEditado->getCidade()){
            $stringSet .= ", cidade = '{$enderecoEditado->getCidade()}'";
            $stringLog .= " cidade: ". $enderecoAtual->getCidade() ." : ".$enderecoEditado->getCidade();
        }
                   
        if($enderecoAtual->getComplemento() != $enderecoEditado->getComplemento()){
            $stringSet .= ", complemento = '{$enderecoEditado->getComplemento()}'";
            $stringLog .= " complemento: ". $enderecoAtual->getComplemento() ." : ".$enderecoEditado->getComplemento();
        }
             
        if($enderecoAtual->getEmail() != $enderecoEditado->getEmail()){
            $stringSet .= ", email = '{$enderecoEditado->getEmail()}'";
            $stringLog .= " email: ". $enderecoAtual->getEmail() ." : ".$enderecoEditado->getEmail();
        }
        
        if($enderecoAtual->getLogradouro() != $enderecoEditado->getLogradouro()){
            $stringSet .= ", logradouro = '{$enderecoEditado->getLogradouro()}'";
            $stringLog .= " logradouro: ". $enderecoAtual->getLogradouro() ." : ".$enderecoEditado->getLogradouro();
        }
                
        if($enderecoAtual->getNumero() != $enderecoEditado->getNumero()){
            $stringSet .= ", numero = '{$enderecoEditado->getNumero()}'";
            $stringLog .= " numero: ". $enderecoAtual->getNumero() ." : ".$enderecoEditado->getNumero();
        }
        
        if($enderecoAtual->getTelefone() != $enderecoEditado->getTelefone()){
            $stringSet .= ", telefone = '{$enderecoEditado->getTelefone()}'";
            $stringLog .= " telefone: ". $enderecoAtual->getTelefone() ." : ".$enderecoEditado->getTelefone();
        }
        
        if($enderecoAtual->getUf() != $enderecoEditado->getUf()){
            $stringSet .= ", uf = '{$enderecoEditado->getUf()}'";
            $stringLog .= " uf: ". $enderecoAtual->getUf() ." : ".$enderecoEditado->getUf();
        }        
                
        $sql =  " UPDATE {$tabela} SET "
                . " modificado_por = '{$_SESSION['id_usuario']}'"
                . " , dt_modificacao = NOW() "
                . " {$stringSet} "
                . "WHERE id_endereco = '{$enderecoAtual->getId_endereco()}'; ";            
                                
        $retorno = $enderecoAtual->update($sql);
        $repositorioLog = new RepositorioLogUpdate();
        if($retorno['msg_tipo']=="success"){
            $novoLog = new LogUpdate($tabela, $enderecoAtual->getId_endereco(), $stringLog);            
            $ret = $repositorioLog->insertObj($novoLog);
        }else{
            $novoLog = new LogUpdate($tabela, $enderecoAtual->getId_endereco(), "Error: " . $retorno['msg']);            
            $ret = $repositorioLog->insertObj($novoLog);
        }
        
        return $retorno;   
    }

    public function excluir(Endereco $obj) {
        $tabela = "tb_endereco";
        $stringLog = "DELETE: ";
        $stringSet = ", ativo = '0'";
        $stringLog .= " ativo: 1 : 0" ;
               
        $sql =  " UPDATE {$tabela} SET "
                . " modificado_por = '{$_SESSION['id_usuario']}'"
                . " , dt_modificacao = NOW() "
                . " {$stringSet} "
                . "WHERE id_endereco = '{$obj->getId_endereco()}'; ";            
                                
        $retorno = $obj->update($sql);
        $repositorioLog = new RepositorioLogUpdate();
        if($retorno['msg_tipo']=="success"){
            $novoLog = new LogUpdate($tabela, $obj->getId_endereco(), $stringLog);            
            $ret = $repositorioLog->insertObj($novoLog);
        }else{
            $novoLog = new LogUpdate($tabela, $obj->getId_endereco(), "Error: " . $retorno['msg']);            
            $ret = $repositorioLog->insertObj($novoLog);
        }
        
        return $retorno;
    }

}
