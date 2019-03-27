<?php

namespace App\Interfaces;
use App\Models\LotacaoJornadaDeTrabalho;

interface IRepositorioLotacaoJornadaDeTrabalho {
    public function insertObj(LotacaoJornadaDeTrabalho $obj);
}
