<?php

namespace App\Interfaces;
use App\Models\Endereco;

interface IRepositorioEndereco {
    public function insertObj(Endereco $endereco);
    public function getEndereco($id): Endereco; 
    public function excluir(Endereco $obj);
}
