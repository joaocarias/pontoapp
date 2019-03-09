<?php

namespace App\Interfaces;
use App\Models\Pessoa;

interface IRepositorioPessoa {
    public function getPessoa($id): Pessoa;
    public function setEmpresa($idPessoa, $idEmpresa);
}
