<?php


namespace App\Models\Dimensionamento;
use Lib\ModelDimensionamento;

class Registro extends ModelDimensionamento{
    private $id_registro;
    private $id_servidor;
    private $dt_entrada;
    private $dt_saida;
    private $st_registro;
    private $st_ponto_aberto;
    private $obs;
    private $horas_justificadas;
    private $registro_justificado;
    private $justificativa_aprovada;
    private $data_ultima_atualizacao;
    private $atualizado_por;
    private $nsr_entrada;
    private $nsr_saida;
    private $idrelogio_entrada;
    private $idrelogio_saida;
    private $trabalhada;
    
    function getId_registro() {
        return $this->id_registro;
    }

    function getId_servidor() {
        return $this->id_servidor;
    }

    function getDt_entrada() {
        return $this->dt_entrada;
    }

    function getDt_saida() {
        return $this->dt_saida;
    }

    function getSt_registro() {
        return $this->st_registro;
    }

    function getSt_ponto_aberto() {
        return $this->st_ponto_aberto;
    }

    function getObs() {
        return $this->obs;
    }

    function getHoras_justificadas() {
        return $this->horas_justificadas;
    }

    function getRegistro_justificado() {
        return $this->registro_justificado;
    }

    function getJustificativa_aprovada() {
        return $this->justificativa_aprovada;
    }

    function getData_ultima_atualizacao() {
        return $this->data_ultima_atualizacao;
    }

    function getAtualizado_por() {
        return $this->atualizado_por;
    }

    function getNsr_entrada() {
        return $this->nsr_entrada;
    }

    function getNsr_saida() {
        return $this->nsr_saida;
    }

    function getIdrelogio_entrada() {
        return $this->idrelogio_entrada;
    }

    function getIdrelogio_saida() {
        return $this->idrelogio_saida;
    }

    function getTrabalhada() {
        return $this->trabalhada;
    }

    function setId_registro($id_registro) {
        $this->id_registro = $id_registro;
    }

    function setId_servidor($id_servidor) {
        $this->id_servidor = $id_servidor;
    }

    function setDt_entrada($dt_entrada) {
        $this->dt_entrada = $dt_entrada;
    }

    function setDt_saida($dt_saida) {
        $this->dt_saida = $dt_saida;
    }

    function setSt_registro($st_registro) {
        $this->st_registro = $st_registro;
    }

    function setSt_ponto_aberto($st_ponto_aberto) {
        $this->st_ponto_aberto = $st_ponto_aberto;
    }

    function setObs($obs) {
        $this->obs = $obs;
    }

    function setHoras_justificadas($horas_justificadas) {
        $this->horas_justificadas = $horas_justificadas;
    }

    function setRegistro_justificado($registro_justificado) {
        $this->registro_justificado = $registro_justificado;
    }

    function setJustificativa_aprovada($justificativa_aprovada) {
        $this->justificativa_aprovada = $justificativa_aprovada;
    }

    function setData_ultima_atualizacao($data_ultima_atualizacao) {
        $this->data_ultima_atualizacao = $data_ultima_atualizacao;
    }

    function setAtualizado_por($atualizado_por) {
        $this->atualizado_por = $atualizado_por;
    }

    function setNsr_entrada($nsr_entrada) {
        $this->nsr_entrada = $nsr_entrada;
    }

    function setNsr_saida($nsr_saida) {
        $this->nsr_saida = $nsr_saida;
    }

    function setIdrelogio_entrada($idrelogio_entrada) {
        $this->idrelogio_entrada = $idrelogio_entrada;
    }

    function setIdrelogio_saida($idrelogio_saida) {
        $this->idrelogio_saida = $idrelogio_saida;
    }

    function setTrabalhada($trabalhada) {
        $this->trabalhada = $trabalhada;
    }
}
