<?php

namespace App\Interfaces;
use App\Models\Lotacao;

interface IRepositorioLotacao {   
    public function insertLotacao(Lotacao $obj);
    public function getObj($id);
//    public function updateLotacao(Lotacao $atual, Lotacao $editado);
    public function excluirLotacao(Lotacao $obj);
    public function getArrayBasic();
    public function getLotacaoPorFuncionario($id);
}
