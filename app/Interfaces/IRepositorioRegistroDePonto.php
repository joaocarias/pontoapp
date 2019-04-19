<?php

namespace App\Interfaces;
use App\Models\RegistroDePonto;

interface IRepositorioRegistroDePonto {
    public function insert(RegistroDePonto $registro);
}
