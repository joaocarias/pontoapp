<?php

namespace App\Models;
use \Lib\Model;

class Pessoa extends Model {
    private $id_pessoa;
    private $nome;
    private $apelido;
    private $data_de_nascimento;
    private $cpf;
    private $rg;
    private $genero;
    private $id_endereco;
    private $id_empresa;
    private $dt_criacao;
    private $criado_por;
    private $dt_modificacao;
    private $modificado_por;
    private $ativo;
    
    
    function __construct($nome = null, $apelido = null, $data_de_nascimento = null, $cpf = null, $rg = null, $genero = null, $id_endereco = null, $id_empresa = null) {
        $this->nome = $nome;
        $this->apelido = $apelido;
        $this->data_de_nascimento = $data_de_nascimento;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->id_endereco = $id_endereco;
        $this->id_empresa = $id_empresa;
        $this->genero = $genero;
    }

    function getId_pessoa() {
        return $this->id_pessoa;
    }

    function getNome() {
        return $this->nome;
    }

    function getApelido() {
        return $this->apelido;
    }

    function getData_de_nascimento() {
        return $this->data_de_nascimento;
    }

    function getCpf() {
        return $this->cpf;
    }
    
    function getGenero() {
        return $this->genero;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    
    function getRg() {
        return $this->rg;
    }

    function getId_endereco() {
        return $this->id_endereco;
    }

    function getId_empresa() {
        return $this->id_empresa;
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

    function setId_pessoa($id_pessoa) {
        $this->id_pessoa = $id_pessoa;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setApelido($apelido) {
        $this->apelido = $apelido;
    }

    function setData_de_nascimento($data_de_nascimento) {
        $this->data_de_nascimento = $data_de_nascimento;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setId_endereco($id_endereco) {
        $this->id_endereco = $id_endereco;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
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
