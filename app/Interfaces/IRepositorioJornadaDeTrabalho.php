<?php

namespace App\Interfaces;
use App\Models\JornadaDeTrabalho;

interface IRepositorioJornadaDeTrabalho {
    public function getJornadaPorTipo($idTipo);
    public function getArrayBasic($idTipo = null);
}
