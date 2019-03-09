<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioEmpresa;
use App\Models\Empresa;
use App\Repositorios\RepositorioLogUpdate;
use App\Models\LogUpdate;

class RepositorioEmpresa implements IRepositorioEmpresa {
    
    public function getEmpresa($id): Empresa {
        $sql = " SELECT * FROM tb_empresa WHERE id_empresa = '{$id}' AND ativo = '1' ";
        $obj = new Empresa();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_empresa($row->id_empresa);                
                $obj->setModificado_por($row->modificado_por);
                $obj->setCnpj($row->cnpj);
                $obj->setId_endereco($row->id_endereco);
                $obj->setNome($row->nome);
                $obj->setNome_fantasia($row->nome_fantasia);                
            }                
            return $obj;
        }else{
            return new Empresa();
        }   
    }

    public function insertEmpresa(Empresa $empresa) {
       $tabela = "tb_empresa";
        
        $params = array(
                "cnpj" =>$empresa->getCnpj(), 
                "id_endereco" => $empresa->getId_endereco(),
                "nome" => $empresa->getNome(),
                "nome_fantasia" => $empresa->getNome_fantasia(),                
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
        
        $arrayRetorno = $empresa->insert($sql);
        return $arrayRetorno; 
    }
    
    public function updateEmpresa(Empresa $empresaAtual, Empresa $empresaEditada){
        $tabela = "tb_empresa";
        $stringLog = "UPDATE: ";
        $stringSet = "";
                
        if($empresaAtual->getCnpj() != $empresaEditada->getCnpj()){
            $stringSet .= ", cnpj = '{$empresaEditada->getCnpj()}'";
            $stringLog .= " cnpj: ". $empresaAtual->getCnpj() ." : ".$empresaEditada->getCnpj() ;
        }
        
        if($empresaAtual->getNome() != $empresaEditada->getNome()){
            $stringSet .= ", nome = '{$empresaEditada->getNome()}'";
            $stringLog .= " nome: ". $empresaAtual->getNome() ." : ".$empresaEditada->getNome() ;
        }
                
        if($empresaAtual->getNome_fantasia() != $empresaEditada->getNome_fantasia()){
            $stringSet .= ", nome_fantasia = '{$empresaEditada->getNome_fantasia()}'";
            $stringLog .= " nome_fantasia: ". $empresaAtual->getNome_fantasia() ." : ".$empresaEditada->getNome_fantasia() ;
        }
                
        $sql =  " UPDATE {$tabela} SET "
                . " modificado_por = '{$_SESSION['id_usuario']}'"
                . " , dt_modificacao = NOW() "
                . " {$stringSet} "
                . "WHERE id_empresa = '{$empresaAtual->getId_empresa()}'; ";            
                                
        $retorno = $empresaAtual->update($sql);
        $repositorioLog = new RepositorioLogUpdate();
        if($retorno['msg_tipo']=="success"){
            $novoLog = new LogUpdate($tabela, $empresaAtual->getId_empresa(), $stringLog);            
            $ret = $repositorioLog->insertObj($novoLog);
        }else{
            $novoLog = new LogUpdate($tabela, $empresaAtual->getId_empresa(), "Error: " . $retorno['msg']);            
            $ret = $repositorioLog->insertObj($novoLog);
        }
        
        return $retorno;
    }

}
