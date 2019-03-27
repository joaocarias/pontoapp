<?php

namespace App\Interfaces;
use App\Models\Funcionario;

interface IRepositorioFuncionario {
    public function insertFuncionario(Funcionario $obj);
    public function getFuncionarioPorPIS($pis): Funcionario;
    public function getFuncionarioPorMatricula($_matricula);
    public function getFuncionarioPorNomeCPFPISMatricula($busca);
    public function getFuncionario($id): Funcionario;
}
