<?php

namespace App\Interfaces;
use App\Models\LogUpdate;

interface IRepositorioUpdate {
    public function insertObj(LogUpdate $logUpdate);
}
