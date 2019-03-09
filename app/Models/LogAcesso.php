<?php

namespace App\Models;
use Lib\Model;
/**
 * Description of LogAcesso
 *
 * @author branc
 */
class LogAcesso extends Model {
    private $id_log;
    private $id_usuario;
    private $login;
    private $acesso;
    private $dada_do_cadastro;
    private $ativo;
    
    function __construct($id_usuario, $login, $acesso) {
        $this->id_usuario = $id_usuario;
        $this->login = $login;
        $this->acesso = $acesso;       
    }

    function getId_log() {
        return $this->id_log;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getLogin() {
        return $this->login;
    }

    function getAcesso() {
        return $this->acesso;
    }

    function getDada_do_cadastro() {
        return $this->dada_do_cadastro;
    }

    function getAtivo() {
        return $this->ativo;
    }

    function setId_log($id_log) {
        $this->id_log = $id_log;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setAcesso($acesso) {
        $this->acesso = $acesso;
    }

    function setDada_do_cadastro($dada_do_cadastro) {
        $this->dada_do_cadastro = $dada_do_cadastro;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
    } 
}
