<?php

namespace App\Interfaces;
use App\Models\Dimensionamento\Servidor;

interface IRepositorioServidor {
    public function getServidorCPF($cpf) : Servidor;
}
