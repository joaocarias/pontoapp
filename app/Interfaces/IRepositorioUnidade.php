<?php

namespace App\Interfaces;
use App\Models\Unidade;

interface IRepositorioUnidade {
    public function getUnidades();
    public function insertUnidade(Unidade $unidade);
    public function getObj($id_unidade);
    public function updateUnidade(Unidade $unidadeAtual, Unidade $unidadeEditada);
    public function excluirUnidade(Unidade $unidade);
}
