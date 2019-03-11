<?php

namespace App\Repositorios;

use App\Interfaces\IRepositorioUsuario;
use App\Models\Usuario;

class RepositorioUsuario implements IRepositorioUsuario{
    
    public function insertObj(Usuario $obj) {
        
    }

    public function getObj($id): Usuario {
        $sql = " SELECT * FROM tb_usuario WHERE id_usuario = '{$id}' AND ativo = '1' ";
        $obj = new Usuario();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_pessoa($row->id_pessoa);
                $obj->setId_usuario($row->id_usuario);
                $obj->setLogin($row->login);
                $obj->setModificado_por($row->modificado_por);
                $obj->setSenha($row->senha);
            }                
            return $obj;
        }else{
            return new Usuario();
        }   
    }

    public function getObjPorLogin($login): Usuario {        
        $sql = " SELECT * FROM tb_usuario WHERE login = '{$login}' AND ativo = '1' ";
        $obj = new Usuario();
                
        $dados = $obj->selectObj($sql);        
        
        if($dados["obj"]){
            foreach ($dados["obj"] as $row){                        
                $obj->setAtivo($row->ativo);
                $obj->setCriado_por($row->criado_por);
                $obj->setDt_criacao($row->dt_criacao);
                $obj->setDt_modificacao($row->dt_modificacao);
                $obj->setId_pessoa($row->id_pessoa);
                $obj->setId_usuario($row->id_usuario);
                $obj->setLogin($row->login);
                $obj->setModificado_por($row->modificado_por);
                $obj->setSenha($row->senha);
            }                
            return $obj;
        }else{
            return new Usuario();
        }        
    }

    public function atulizarSenha(Usuario $usuario, $nova_senha) {
        $tabela = "tb_usuario";
        $stringLog = "UPDATE: ";
        $stringSet = "";
       
        $stringSet .= ", senha = '{$nova_senha}'";
        $stringLog .= " senha " ;
        
        $sql =  " UPDATE {$tabela} SET "
                . " modificado_por = '{$_SESSION['id_usuario']}'"
                . " , dt_modificacao = NOW() "
                . " {$stringSet} "
                . "WHERE id_usuario = '{$usuario->getId_usuario()}'; ";
                
        $retorno = $usuario->update($sql);
        return $retorno;
    }

}
