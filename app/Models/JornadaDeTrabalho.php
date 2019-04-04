<?php

namespace App\Models;
use Lib\Model;

class JornadaDeTrabalho extends Model {
    private $id;
    private $id_empresa; 
    private $id_tipo_jornada_de_trabalho;
    private $descricao;
    private $seg;
    private $ter;
    private $qua;
    private $qui;
    private $sex;
    private $sab;
    private $dom;  
    private $num_platoes;
    private $carga_plantao;  
    private $dt_criacao;
    private $criado_por;
    private $dt_modificacao;
    private $modificado_por;
    private $ativo;
    private $hora_trabalho;
            
    function __construct($id_empresa = null, $id_tipo_jornada_de_trabalho = null, $descricao = null
            , $seg = 0, $ter = 0, $qua = 0, $qui = 0, $sex = 0, $sab = 0, $dom= 0
            , $num_platoes = 0, $carga_plantao = 0, $hora_trabalho = 0) {
        $this->id_empresa = $id_empresa;
        $this->id_tipo_jornada_de_trabalho = $id_tipo_jornada_de_trabalho;
        $this->descricao = $descricao;
        $this->seg = $seg;
        $this->ter = $ter;
        $this->qua = $qua;
        $this->qui = $qui;
        $this->sex = $sex;
        $this->sab = $sab;
        $this->dom = $dom;
        $this->num_platoes = $num_platoes;
        $this->carga_plantao = $carga_plantao;
        $this->hora_trabalho = $hora_trabalho;
    }
        
    function getId() {
        return $this->id;
    }

    function getId_tipo_jornada_de_trabalho() {
        return $this->id_tipo_jornada_de_trabalho;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getSeg() {
        return $this->seg;
    }

    function getTer() {
        return $this->ter;
    }

    function getQua() {
        return $this->qua;
    }

    function getQui() {
        return $this->qui;
    }

    function getSex() {
        return $this->sex;
    }

    function getSab() {
        return $this->sab;
    }

    function getDom() {
        return $this->dom;
    }

    function getNum_platoes() {
        return $this->num_platoes;
    }

    function getCarga_plantao() {
        return $this->carga_plantao;
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

    function setId_tipo_jornada_de_trabalho($id_tipo_jornada_de_trabalho) {
        $this->id_tipo_jornada_de_trabalho = $id_tipo_jornada_de_trabalho;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setSeg($seg) {
        $this->seg = $seg;
    }

    function setTer($ter) {
        $this->ter = $ter;
    }

    function setQua($qua) {
        $this->qua = $qua;
    }

    function setQui($qui) {
        $this->qui = $qui;
    }

    function setSex($sex) {
        $this->sex = $sex;
    }

    function setSab($sab) {
        $this->sab = $sab;
    }

    function setDom($dom) {
        $this->dom = $dom;
    }

    function setNum_platoes($num_platoes) {
        $this->num_platoes = $num_platoes;
    }

    function setCarga_plantao($carga_plantao) {
        $this->carga_plantao = $carga_plantao;
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
    
    function getId_empresa() {
        return $this->id_empresa;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    
    function getHora_trabalho() {
        return $this->hora_trabalho;
    }

    function setHora_trabalho($hora_trabalho) {
        $this->hora_trabalho = $hora_trabalho;
    }
}
