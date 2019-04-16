<?php

namespace App\Models;
use \Lib\Model;

class Competencia extends Model {
    private $id;
    private $id_empresa;
    private $mes;
    private $ano;
    private $dt_criacao;
    private $criado_por;
    private $dt_modificacao;
    private $modificado_por;
    private $ativo;
    
    function __construct($id_empresa = null, $mes = null, $ano = null) {
        $this->id_empresa = $id_empresa;
        $this->mes = $mes;
        $this->ano = $ano;
    }
    
    function getId() {
        return $this->id;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function getMes() {
        return $this->mes;
    }

    function getAno() {
        return $this->ano;
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

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    function setMes($mes) {
        $this->mes = $mes;
    }

    function setAno($ano) {
        $this->ano = $ano;
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
