<?php

namespace App\Models;
use \Lib\Model;

class Empresa extends Model {
    public $id_empresa;
    public $nome;
    public $nome_fantasia;
    public $cnpj;
    public $id_endereco;
    public $dt_criacao;
    public $criado_por;
    public $dt_modificacao;
    public $modificado_por;
    public $ativo;
    
    function __construct($nome = null, $nome_fantasia = null, $cnpj = null, $id_endereco = null) {
        $this->nome = $nome;
        $this->nome_fantasia = $nome_fantasia;
        $this->cnpj = $cnpj;
        $this->id_endereco = $id_endereco;
    }
    
    function getId_empresa() {
        return $this->id_empresa;
    }

    function getNome() {
        return $this->nome;
    }

    function getNome_fantasia() {
        return $this->nome_fantasia;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function getId_endereco() {
        return $this->id_endereco;
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

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setNome_fantasia($nome_fantasia) {
        $this->nome_fantasia = $nome_fantasia;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setId_endereco($id_endereco) {
        $this->id_endereco = $id_endereco;
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
