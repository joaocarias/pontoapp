<?php

namespace App\Interfaces;
use App\Models\Justificativa;

interface IRepositorioJustificativa {
    public function getJustificativas();
    public function insertJustificativa(Justificativa $obj);
    public function getObj($id);
    public function updateJustificativa(Justificativa $atual, Justificativa $editada);
    public function excluirJustificativa(Justificativa $obj);
    public function getArrayBasic();
}
