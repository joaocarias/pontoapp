<?php

namespace App\Models\Dimensionamento;
use Lib\ModelDimensionamento;

class Servidor extends ModelDimensionamento {
    private $nome_servidor;
    private $alcunha_servidor;
    private $cpf_servidor;
    private $sexo;
    private $telefone;
    private $email;
    private $dt_nascimento_servidor;
    private $pis;
    
    function __construct($nome_servidor = null, $alcunha_servidor = null, $cpf_servidor = null, $sexo = null, $telefone = null
            , $email = null, $dt_nascimento_servidor = null, $pis = null) {
        $this->nome_servidor = $nome_servidor;
        $this->alcunha_servidor = $alcunha_servidor;
        $this->cpf_servidor = $cpf_servidor;
        $this->sexo = $sexo;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->dt_nascimento_servidor = $dt_nascimento_servidor;
        $this->pis = $pis;
    }
    
    function getNome_servidor() {
        return $this->nome_servidor;
    }

    function getAlcunha_servidor() {
        return $this->alcunha_servidor;
    }

    function getCpf_servidor() {
        return $this->cpf_servidor;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getDt_nascimento_servidor() {
        return $this->dt_nascimento_servidor;
    }

    function getPis() {
        return $this->pis;
    }

    function setNome_servidor($nome_servidor) {
        $this->nome_servidor = $nome_servidor;
    }

    function setAlcunha_servidor($alcunha_servidor) {
        $this->alcunha_servidor = $alcunha_servidor;
    }

    function setCpf_servidor($cpf_servidor) {
        $this->cpf_servidor = $cpf_servidor;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDt_nascimento_servidor($dt_nascimento_servidor) {
        $this->dt_nascimento_servidor = $dt_nascimento_servidor;
    }

    function setPis($pis) {
        $this->pis = $pis;
    }            
}
