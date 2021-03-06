<?php

namespace App\Interfaces;
use App\Models\Feriado;

interface IRepositorioFeriado {   
    public function getFeriados($de, $ate);
    public function insertFeriado(Feriado $obj);
    public function getObj($id);
    public function getFeriado($data);
    public function updateFeriado(Feriado $atual, Feriado $editado);
    public function excluirFeriado(Feriado $unidade);
    public function verificaFeriado($data, $arrayFeriados) : bool;    
}
