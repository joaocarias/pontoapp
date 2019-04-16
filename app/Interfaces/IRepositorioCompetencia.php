<?php

namespace App\Interfaces;
use App\Models\Competencia;

interface IRepositorioCompetencia {
    public function getCompetencias();
    public function getObj($id) : Competencia;
    public function getArrayBasic();
    public function getObjMesAno($mes, $ano): Competencia;
}
