<?php

namespace App\Models;
use Lib\Model;

class LogUpdate extends Model{
    private $id_log;
    private $tabela;
    private $id_tabela;
    private $reg_log;
    private $criado_por;
    private $data_do_cadastro;
    private $ativo;
    
    function __construct($tabela, $id_tabela, $reg_log) {
        $this->tabela = $tabela;
        $this->id_tabela = $id_tabela;
        $this->reg_log = $reg_log;
    }
    
    function getId_log() {
        return $this->id_log;
    }

    function getTabela() {
        return $this->tabela;
    }

    function getId_tabela() {
        return $this->id_tabela;
    }

    function getReg_log() {
        return $this->reg_log;
    }

    function getCriado_por() {
        return $this->criado_por;
    }

    function getData_do_cadastro() {
        return $this->data_do_cadastro;
    }

    function getAtivo() {
        return $this->ativo;
    }

    function setId_log($id_log) {
        $this->id_log = $id_log;
    }

    function setTabela($tabela) {
        $this->tabela = $tabela;
    }

    function setId_tabela($id_tabela) {
        $this->id_tabela = $id_tabela;
    }

    function setReg_log($reg_log) {
        $this->reg_log = $reg_log;
    }

    function setCriado_por($criado_por) {
        $this->criado_por = $criado_por;
    }

    function setData_do_cadastro($data_do_cadastro) {
        $this->data_do_cadastro = $data_do_cadastro;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

}
