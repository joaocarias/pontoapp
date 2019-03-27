<?php

namespace App\Interfaces;
use App\Models\TipoJornadaDeTrabalho;

interface IRepositorioTipoJornadaDeTrabalho {
    public function getObj($id) : TipoJornadaDeTrabalho;
    public function getArrayBasic();
    public function getTipoJornadasDeTrabalho();
}
