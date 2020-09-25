<?php

namespace App\Http\Controllers\Usuario;

use App\Models\Usuario;
use App\Http\Controllers\Controller;


class UsuarioControllerRemover extends Controller
{
    public function remover($id) {
        $usuario = Usuario::find($id);
        if($usuario) {
            $usuario->delete();
            return redirect('usuarios');
        }
    }
}
