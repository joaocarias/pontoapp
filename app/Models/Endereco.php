<?php

namespace App\Models;
use \Lib\Model;

class Endereco extends Model {
    public $id_endereco;
    public $logradouro; 
    public $numero;
    public $complemento;
    public $cep;
    public $bairro;
    public $cidade;
    public $uf;
    public $telefone;
    public $celular;
    public $email;
    public $dt_criacao;
    public $criado_por;
    public $dt_modificacao;
    public $modificado_por;
    public $ativo;
    
    function __construct($logradouro = null, $numero  = null, $complemento = null, $cep = null, $bairro = null, $cidade = null, $uf = null, $telefone = null, $celular = null, $email = null) {
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->cep = $cep;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->telefone = $telefone;
        $this->celular = $celular;
        $this->email = $email;
    }
    
    function getId_endereco() {
        return $this->id_endereco;
    }

    function getLogradouro() {
        return $this->logradouro;
    }

    function getNumero() {
        return $this->numero;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getCep() {
        return $this->cep;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getUf() {
        return $this->uf;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getCelular() {
        return $this->celular;
    }

    function getEmail() {
        return $this->email;
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

    function setId_endereco($id_endereco) {
        $this->id_endereco = $id_endereco;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setUf($uf) {
        $this->uf = $uf;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setEmail($email) {
        $this->email = $email;
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
