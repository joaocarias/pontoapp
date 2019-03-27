<?php

namespace App\Models;
use Lib\Model;

class Funcionario extends Model {
    private $id;
    private $id_pessoa;    
    private $dt_criacao;
    private $criado_por;
    private $dt_modificacao;
    private $modificado_por;
    private $ativo;
    private $pis;
    private $matricula;
            
    function __construct($id_pessoa = null, $pis = null, $matricula = null) {
        $this->id_pessoa = $id_pessoa;
        $this->pis = $pis;
        $this->matricula = $matricula;
    }
    
    function getMatricula() {
        return $this->matricula;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }
        
    function getPis() {
        return $this->pis;
    }

    function setPis($pis) {
        $this->pis = $pis;
    }
    
    function getId() {
        return $this->id;
    }

    function getId_pessoa() {
        return $this->id_pessoa;
    }

    function getDt_criacao() {
        return $this->dt_criacao;
    }

    function getCriado_por() {
        return $this->criado_por;
    }

    function getDt_modificacao() {
        return $this->dt_modificacao;
    }

    function getModificado_por() {
        return $this->modificado_por;
    }

    function getAtivo() {
        return $this->ativo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_pessoa($id_pessoa) {
        $this->id_pessoa = $id_pessoa;
    }

    function setDt_criacao($dt_criacao) {
        $this->dt_criacao = $dt_criacao;
    }

    function setCriado_por($criado_por) {
        $this->criado_por = $criado_por;
    }

    function setDt_modificacao($dt_modificacao) {
        $this->dt_modificacao = $dt_modificacao;
    }

    function setModificado_por($modificado_por) {
        $this->modificado_por = $modificado_por;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
    }
}
