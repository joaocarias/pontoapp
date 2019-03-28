<?php

namespace Lib;

class ModelDimensionamento extends ConexaoDimensionamento {
    public function insert($sql){
        try{
            $pdo = parent::getDB();
            $query = $pdo->prepare($sql);
            $query->execute();
                                   
            return array("id"=>$pdo->lastInsertId(), "msg_tipo"=>"success", "msg"=>"Cadastrado realizado com sucesso!");
        } catch (Exception $ex) {
            return array("id"=>-1, "msg_tipo"=>"error", "msg"=>$ex->getMessage());
        }
    }
    
    public function selectObj($sql){
        try{
            $pdo = parent::getDB();
            $query = $pdo->prepare($sql);
            $query->execute();
            
            $array = array();
            while($row = $query->fetchObject()){
                $array[] = $row;
            }
            return array("obj"=>$array,  "msg_tipo"=>"sucess", "msg"=>"ok") ;
        } catch (Exception $ex) {
            return array("obj"=>null, "msg_tipo"=>"error", "msg"=>$ex->getMessage());
        }
    }
    
    public function update($sql){
        try{
            $pdo = parent::getDB();
            $query = $pdo->prepare($sql);
            $query->execute();
                                   
            return array("msg_tipo"=>"success", "msg"=>"Cadastrado atualizado com sucesso!");
        } catch (Exception $ex) {
            return array("msg_tipo"=>"error", "msg"=>$ex->getMessage());
        }
    }
}
