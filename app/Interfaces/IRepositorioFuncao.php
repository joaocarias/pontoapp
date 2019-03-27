<?php

namespace App\Interfaces;
use App\Models\Funcao;

interface IRepositorioFuncao {
    public function getFuncoes();
    public function insertFuncao(Funcao $obj);
    public function getObj($id);
    public function updateFuncao(Funcao $atual, Funcao $editada);
    public function excluirFuncao(Funcao $obj);
    public function getArrayBasic();
}
