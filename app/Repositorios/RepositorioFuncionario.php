<?php

namespace App\Repositorios;
use App\Interfaces\IRepositorioFuncionario;
use App\Models\Funcionario;
use App\Repositorios\RepositorioLogUpdate;
use App\Models\LogUpdate;

class RepositorioFuncionario implements IRepositorioFuncionario {
    
    public function insertFuncionario(Funcionario $obj) {
        $i = 0;
        $tabela = "tb_funcionario";
        
        $params = array(
                "pis" =>$obj->getPis(),
                "matricula" => $obj->getMatricula(),
                "id_pessoa" =>$obj->getId_pessoa(),
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

    public function getFuncionarioPorPIS($pis): Funcionario {
        $sql = " SELECT * FROM tb_funcionario WHERE pis = '{$pis}' AND ativo = '1' ";
        $obj = new Funcionario();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_pessoa($row->id_pessoa);                
                $obj->setModificado_por($row->modificado_por);
                $obj->setId($row->id);
                $obj->setPis($row->pis);      
                $obj->setMatricula($row->matricula);
            }                
            return $obj;
        }else{
            return new Funcionario();
        }
    }

    public function getFuncionarioPorNomeCPFPISMatricula($busca) {
        $sql = " SELECT f.id as id_funcionario, p.nome as nome, p.cpf as cpf, f.pis as pis, f.matricula as matricula "
                . " FROM tb_funcionario as f "
                . " INNER JOIN tb_pessoa as p on p.id_pessoa = f.id_pessoa "
                . " WHERE (f.pis like '%{$busca}%' OR f.matricula like '%{$busca}%' OR p.cpf like '%{$busca}%' OR p.nome like '%{$busca}%'  ) AND p.ativo = '1' and f.ativo = '1' ";
        
        $obj = new Funcionario();                
        $dados = $obj->selectObj($sql);
        return $dados["obj"];
        
    }

    public function getFuncionario($id): Funcionario {
         $sql = " SELECT * FROM tb_funcionario WHERE id = '{$id}' AND ativo = '1' ";
        $obj = new Funcionario();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_pessoa($row->id_pessoa);                
                $obj->setModificado_por($row->modificado_por);
                $obj->setId($row->id);
                $obj->setPis($row->pis);   
                $obj->setMatricula($row->matricula);
            }                
            return $obj;
        }else{
            return new Funcionario();
        }
    }

    public function getFuncionarioPorMatricula($_matricula) {
        $sql = " SELECT * FROM tb_funcionario WHERE matricula = '{$_matricula}' AND ativo = '1' ";
        $obj = new Funcionario();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_pessoa($row->id_pessoa);                
                $obj->setModificado_por($row->modificado_por);
                $obj->setId($row->id);
                $obj->setPis($row->pis);                
                $obj->setMatricula($row->matricula);
            }                
            return $obj;
        }else{
            return new Funcionario();
        }
    }

    public function getFuncionarioPorIdPessoa($id_pessoa) {
        $sql = " SELECT * FROM tb_funcionario WHERE id_pessoa = '{$id_pessoa}' AND ativo = '1' ";
        $obj = new Funcionario();

        $dados = $obj->selectObj($sql);

        if($dados["obj"]){
            foreach ($dados["obj"] as $row){
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_pessoa($row->id_pessoa);
                $obj->setModificado_por($row->modificado_por);
                $obj->setId($row->id);
                $obj->setPis($row->pis);
                $obj->setMatricula($row->matricula);
            }
            return $obj;
        }else{
            return new Funcionario();
        }
    }
    
    public function excluir(Funcionario $obj){
        $tabela = "tb_funcionario";
        $stringLog = "DELETE: ";
        $stringSet = ", ativo = '0'";
        $stringLog .= " ativo: 1 : 0" ;
               
        $sql =  " UPDATE {$tabela} SET "
                . " modificado_por = '{$_SESSION['id_usuario']}'"
                . " , dt_modificacao = NOW() "
                . " {$stringSet} "
                . "WHERE id = '{$obj->getId()}'; ";            
                                
        $retorno = $obj->update($sql);
        $repositorioLog = new RepositorioLogUpdate();
        if($retorno['msg_tipo']=="success"){
            $novoLog = new LogUpdate($tabela, $obj->getId(), $stringLog);            
            $ret = $repositorioLog->insertObj($novoLog);
        }else{
            $novoLog = new LogUpdate($tabela, $obj->getId(), "Error: " . $retorno['msg']);            
            $ret = $repositorioLog->insertObj($novoLog);
        }
        
        return $retorno;
    }

    public function getFuncionariosComPis() {
        $sql = " select * from tb_funcionario where pis is not null && pis != '' AND ativo = '1' ";
        $obj = new Funcionario();
        $array = array();
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){
                $obj = new Funcionario();
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_pessoa($row->id_pessoa);                
                $obj->setModificado_por($row->modificado_por);
                $obj->setId($row->id);
                $obj->setPis($row->pis);                
                $obj->setMatricula($row->matricula);
                array_push($array, $obj);
            }                
            return $array;
        }else{
            return array();
        }
    }

}
