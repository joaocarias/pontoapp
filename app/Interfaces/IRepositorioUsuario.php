<?php

namespace App\Interfaces;
use App\Models\Usuario;
interface IRepositorioUsuario {
    public function insertObj(Usuario $obj);
    public function getObj($id): Usuario;
    public function getObjPorLogin($login): Usuario;
    public function atulizarSenha(Usuario $usuario, $nova_senha);
    
}
