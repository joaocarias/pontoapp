<?php

namespace App\Interfaces;
use App\Models\LogAcesso;

interface IRepositorioLogAcesso {
    public function insertObj(LogAcesso $logAcesso);
}
