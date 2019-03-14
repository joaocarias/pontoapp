<?php

namespace App\Interfaces;
use App\Models\Feriado;

interface IRepositorioFeriado {   
    public function getFeriados($de, $ate);
    public function insertFeriado(Feriado $obj);
    public function getObj($id);
    public function updateFeriado(Feriado $atual, Feriado $editado);
    public function excluirFeriado(Feriado $unidade);
}
