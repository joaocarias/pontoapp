<?php

namespace App\Interfaces;
use App\Models\Pessoa;

interface IRepositorioPessoa {
    public function getPessoa($id): Pessoa;
    public function setEmpresa($idPessoa, $idEmpresa);
    public function getPessoaPorCpf($cpf): Pessoa;
    public function insertPessoa(Pessoa $pessoa);
    public function excluir(Pessoa $obj);
}
