<?php

namespace App\Interfaces;
use App\Models\JornadaDeTrabalho;

interface IRepositorioJornadaDeTrabalho {
    public function getJornadaPorTipo($idTipo);
    public function getArrayBasic($idTipo = null);
    public function getObj($id) : JornadaDeTrabalho;
    public function getCargaMensal($id);
    public function getCargaPeriodo($id, $dataInicio = null, $dataFim = null);
}
