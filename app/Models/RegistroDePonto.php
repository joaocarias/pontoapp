<?php

namespace App\Models;
use Lib\Model;

class RegistroDePonto extends Model {
    private $id;
    private $id_registro;
    private $id_servidor;
    private $id_funcionario;
    private $id_empresa;
    private $dt_entrada;
    private $dt_saida;
    private $tempo_atividade;
    private $ponto_em_aberto;
    private $obs;
    private $nsr_entrada;
    private $nsr_saida;
    private $id_relogio_entrada;
    private $id_relogio_saida;
    private $dt_criacao;
    private $criado_por;
    private $dt_modificacao;
    private $modificado_por;
    private $ativo;
    
    function __construct($id_registro = null, $id_servidor = null, $id_funcionario = null, $dt_entrada = null
            , $dt_saida  = null, $ponto_em_aberto = null, $obs = null, $nsr_entrada = null, $nsr_saida = null
            , $id_relogio_entrada = null, $id_relogio_saida = null) {
        
        $this->id_registro = $id_registro;
        $this->id_servidor = $id_servidor;
        $this->id_funcionario = $id_funcionario;
                
        $this->dt_entrada = !is_null($dt_entrada) && $dt_entrada != '' ? $dt_entrada : '0000-00-00 00:00:00' ;
        $this->dt_saida = !is_null($dt_saida) && $dt_saida != '' ? $dt_saida : '0000-00-00 00:00:00' ;
        $this->ponto_em_aberto = !is_null($ponto_em_aberto) & $ponto_em_aberto != '' && ($ponto_em_aberto == 0 || $ponto_em_aberto == 1) ? $ponto_em_aberto : '0';
        
        if($this->dt_entrada != '0000-00-00 00:00:00' && $this->dt_saida != '0000-00-00 00:00:00' && (strtotime($this->dt_entrada) < strtotime($this->dt_saida)) && $this->ponto_em_aberto == 0 ){
            $dateStart = new \DateTime($this->dt_entrada);
            $dateNow   = new \DateTime($this->dt_saida);
 
            $dateDiff = $dateStart->diff($dateNow);
            $this->tempo_atividade = (($dateDiff->h * 60) + $dateDiff->i);
        }else{
            $this->tempo_atividade = 0;
        }             
        
        $this->nsr_entrada = !is_null($nsr_entrada) && $nsr_entrada != '' && is_numeric($nsr_entrada) ? $nsr_entrada : '0';
        $this->nsr_saida = !is_null($nsr_saida) && $nsr_saida != '' && is_numeric($nsr_saida) ? $nsr_saida : '0';
        
        $this->id_relogio_entrada = !is_null($id_relogio_entrada) && $id_relogio_entrada != '' && is_numeric($id_relogio_entrada) ? $id_relogio_entrada : '0';
        $this->id_relogio_saida = !is_null($id_relogio_saida) && $id_relogio_saida != '' && is_numeric($id_relogio_saida) ? $id_relogio_saida : '0';
   
        $this->obs = $obs;
        
    }
    
    function getObs() {
        return $this->obs;
    }

    function setObs($obs) {
        $this->obs = $obs;
    }
    
    function getId() {
        return $this->id;
    }

    function getId_registro() {
        return $this->id_registro;
    }

    function getId_servidor() {
        return $this->id_servidor;
    }

    function getId_funcionario() {
        return $this->id_funcionario;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function getDt_entrada() {
        return $this->dt_entrada;
    }

    function getDt_saida() {
        return $this->dt_saida;
    }

    function getTempo_atividade() {
        return $this->tempo_atividade;
    }

    function getPonto_em_aberto() {
        return $this->ponto_em_aberto;
    }

    function getNsr_entrada() {
        return $this->nsr_entrada;
    }

    function getNsr_saida() {
        return $this->nsr_saida;
    }

    function getId_relogio_entrada() {
        return $this->id_relogio_entrada;
    }

    function getId_relogio_saida() {
        return $this->id_relogio_saida;
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

    function setId_registro($id_registro) {
        $this->id_registro = $id_registro;
    }

    function setId_servidor($id_servidor) {
        $this->id_servidor = $id_servidor;
    }

    function setId_funcionario($id_funcionario) {
        $this->id_funcionario = $id_funcionario;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    function setDt_entrada($dt_entrada) {
        $this->dt_entrada = $dt_entrada;
    }

    function setDt_saida($dt_saida) {
        $this->dt_saida = $dt_saida;
    }

    function setTempo_atividade($tempo_atividade) {
        $this->tempo_atividade = $tempo_atividade;
    }

    function setPonto_em_aberto($ponto_em_aberto) {
        $this->ponto_em_aberto = $ponto_em_aberto;
    }

    function setNsr_entrada($nsr_entrada) {
        $this->nsr_entrada = $nsr_entrada;
    }

    function setNsr_saida($nsr_saida) {
        $this->nsr_saida = $nsr_saida;
    }

    function setId_relogio_entrada($id_relogio_entrada) {
        $this->id_relogio_entrada = $id_relogio_entrada;
    }

    function setId_relogio_saida($id_relogio_saida) {
        $this->id_relogio_saida = $id_relogio_saida;
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
