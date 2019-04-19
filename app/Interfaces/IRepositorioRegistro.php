<?php

namespace App\Interfaces;
use App\Models\Dimensionamento\Registro;

interface IRepositorioRegistro {
    public function getRegistrosPorPis($pis, $de, $ate);
}
