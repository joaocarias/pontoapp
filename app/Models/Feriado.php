<?php


namespace App\Models;
use Lib\Model;

class Feriado extends Model {
    public $id_feriado;
    public $nome;
    public $dt_feriado;
    public $dt_criacao;
    public $criado_por;
    public $dt_modificacao;
    public $modificado_por;
    public $ativo;
    
    function __construct($nome = null, $dt_feriado = null) {
        $this->nome = $nome;
        $this->dt_feriado = $dt_feriado;
    }
    
    function getId_feriado() {
        return $this->id_feriado;
    }

    function getNome() {
        return $this->nome;
    }

    function getDt_feriado() {
        return $this->dt_feriado;
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

    function setId_feriado($id_feriado) {
        $this->id_feriado = $id_feriado;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDt_feriado($dt_feriado) {
        $this->dt_feriado = $dt_feriado;
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
