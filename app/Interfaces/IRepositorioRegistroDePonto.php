<?php

namespace App\Interfaces;
use App\Models\RegistroDePonto;

interface IRepositorioRegistroDePonto {
    public function insertEntrada(RegistroDePonto $registro);
    public function insertSaida(RegistroDePonto $obj);
    public function verificarInseridoEntrada($idRegistro);
    public function verificarInseridoSaida($idRegistro, $pontoAberto, $idRelogioSaida);
}
