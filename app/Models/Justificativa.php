<?php

namespace App\Models;
use Lib\Model;

class Justificativa extends Model{
    private $id_justificativa;
    private $id_funcionario;
    private $id_empresa;
    private $data;
    private $hrs_justificadas;
    private $txt_justificado;
    private $status;
    private $doc_justificativa;
    private $dt_criacao;
    private $dt_mod_aprova;
    private $dt_modificacao;
    private $modificado_por;
    private $ativo;
    
    function __construct($id_funcionario = NULL, $data = NULL, $hrs_justificadas = NULL, $txt_justificativa = NULL) {
        $this->id_funcionario = $id_funcionario;
        $this->data = $data;
        $this->hrs_justificadas = $hrs_justificadas;
        $this->txt_justificado = $txt_justificativa;
    }

    /**
     * @return mixed
     */
    public function getId_justificativa() {
        return $this->id_justificativa;
    }

    /**
     * @return mixed
     */
    public function getId_funcionario() {
        return $this->id_funcionario;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    /**
     * @return mixed
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getHrs_justificadas() {
        return $this->hrs_justificadas;
    }

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getDtModAprova() {
        return $this->dt_mod_aprova;
    }

    /**
     * @return mixed
     */
    public function getTxt_justificado() {
        return $this->txt_justificado;
    }

    /**
     * @return mixed
     */
    public function getDoc_justificativa() {
        return $this->doc_justificativa;
    }

    function getDt_criacao() {
        return $this->dt_criacao;
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

    /**
     * @param mixed $id_justificativa
     */
    public function setId_justificativa($id_justificativa) {
        $this->id_justificativa = $id_justificativa;
    }

    /**
     * @param mixed $id_funcionario
     */
    public function setId_funcionario($id_funcionario) {
        $this->id_funcionario = $id_funcionario;
    }

    /**
     * @param mixed $data
     */
    public function setData($data) {
        $this->data = $data;
    }

    /**
     * @param mixed $hrs_justificadas
     */
    public function setHrs_justificadas($hrs_justificadas) {
        $this->hrs_justificadas = $hrs_justificadas;
    }

    /**
     * @param mixed $txt_justificado
     */
    public function setTxt_justificado($txt_justificado) {
        $this->txt_justificado = $txt_justificado;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @param mixed $doc_justificativa
     */
    public function setDoc_justificativa($doc_justificativa) {
        $this->doc_justificativa = $doc_justificativa;
    }

    /**
     * @param mixed $dt_mod_aprova
     */
    public function setDtModAprova($dt_mod_aprova) {
        $this->dt_mod_aprova = $dt_mod_aprova;
    }

    function setDt_criacao($dt_criacao) {
        $this->dt_criacao = $dt_criacao;
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
