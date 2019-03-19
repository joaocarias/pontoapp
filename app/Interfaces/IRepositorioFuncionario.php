<?php

namespace App\Interfaces;
use App\Models\Funcionario;

interface IRepositorioFuncionario {
    public function insertFuncionario(Funcionario $obj);
    public function getFuncionarioPorPIS($pis): Funcionario;
    public function getFuncionarioPorNomeCPFPIS($busca);
    public function getFuncionario($id): Funcionario;
}
