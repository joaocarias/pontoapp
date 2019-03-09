<?php

namespace App\Models;

use \Lib\Model;

class Usuario extends Model{
    private $id_usuario;
    private $id_pessoa;
    private $login;
    private $senha;
    private $dt_criacao;
    private $criado_por;
    private $dt_modificacao;
    private $modificado_por;
    private $ativo;
    
    function __construct($id_pessoa = null, $login = null, $senha = null) {
        $this->id_pessoa = $id_pessoa;
        $this->login = $login;
        $this->senha = $senha;
    }
    
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_pessoa() {
        return $this->id_pessoa;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
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

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_pessoa($id_pessoa) {
        $this->id_pessoa = $id_pessoa;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
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
