<?php

namespace App\Interfaces;
use App\Models\Empresa;

interface IRepositorioEmpresa {
    public function getEmpresa($id): Empresa; 
    public function insertEmpresa(Empresa $empresa);
}
