<?php

namespace App\Interfaces;
use App\Models\LotacaoRegistraPonto;

interface IRepositorioLotacaoRegistraPonto {   
    public function insertObj(LotacaoRegistraPonto $obj);
    public function getObj($id);
}
