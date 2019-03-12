<?php

namespace App\Models;
use Lib\Model;

class Unidade extends Model{
    public $id_unidade;
    public $nome;
    public $dt_criacao;
    public $criado_por;
    public $dt_modificacao;
    public $modificado_por;
    public $ativo;
    
    function __construct($nome = null) {
        $this->nome = $nome;
    }
    
    function getId_unidade() {
        return $this->id_unidade;
    }

    function getNome() {
        return $this->nome;
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

    function setId_unidade($id_unidade) {
        $this->id_unidade = $id_unidade;
    }

    function setNome($nome) {
        $this->nome = $nome;
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
