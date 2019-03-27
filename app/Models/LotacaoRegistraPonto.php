<?php

namespace App\Models;
use Lib\Model;

class LotacaoRegistraPonto extends Model{
  private $id;
  private $id_lotacao; 
  private $registra_ponto;
  private $dt_criacao;
  private $criado_por;
  private $dt_modificacao;
  private $modificado_por;
  private $ativo;
  
  function __construct($id_lotacao = null, $registra_ponto = null) {
      $this->id_lotacao = $id_lotacao;
      $this->registra_ponto = $registra_ponto;
  }

  function getId() {
      return $this->id;
  }

  function getId_lotacao() {
      return $this->id_lotacao;
  }

  function getRegistra_ponto() {
      return $this->registra_ponto;
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

  function setId_lotacao($id_lotacao) {
      $this->id_lotacao = $id_lotacao;
  }

  function setRegistra_ponto($registra_ponto) {
      $this->registra_ponto = $registra_ponto;
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
