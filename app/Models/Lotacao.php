<?php

namespace App\Models;
use Lib\Model;

class Lotacao extends Model {
    private $id;
    private $id_funcionario;
    private $id_unidade;
    private $id_funcao;
    private $dt_inicio_lotacao;
    private $dt_fim_lotacao;    
    private $dt_criacao;
    private $criado_por;
    private $dt_modificacao;
    private $modificado_por;
    private $ativo;    
            
    function __construct($id_funcionario = null, $id_unidade = null, $id_funcao = null
            , $dt_inicio_lotacao = null) {
        $this->id_funcionario = $id_funcionario;
        $this->id_unidade = $id_unidade;
        $this->id_funcao = $id_funcao;
        $this->dt_inicio_lotacao = $dt_inicio_lotacao;
        
    }
    
    function getId() {
        return $this->id;
    }

    function getId_funcionario() {
        return $this->id_funcionario;
    }

    function getId_unidade() {
        return $this->id_unidade;
    }

    function getId_funcao() {
        return $this->id_funcao;
    }

    function getDt_inicio_lotacao() {
        return $this->dt_inicio_lotacao;
    }

    function getDt_fim_lotacao() {
        return $this->dt_fim_lotacao;
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

    function setId_funcionario($id_funcionario) {
        $this->id_funcionario = $id_funcionario;
    }

    function setId_unidade($id_unidade) {
        $this->id_unidade = $id_unidade;
    }

    function setId_funcao($id_funcao) {
        $this->id_funcao = $id_funcao;
    }

    function setDt_inicio_lotacao($dt_inicio_lotacao) {
        $this->dt_inicio_lotacao = $dt_inicio_lotacao;
    }

    function setDt_fim_lotacao($dt_fim_lotacao) {
        $this->dt_fim_lotacao = $dt_fim_lotacao;
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
