<?php

namespace App\Interfaces;
use App\Models\LogAcesso;
/**
 *
 * @author branc
 */
interface IRepositorioLogAcesso {
    public function insertObj(LogAcesso $logAcesso);
}
