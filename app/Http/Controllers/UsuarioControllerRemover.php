<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

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
