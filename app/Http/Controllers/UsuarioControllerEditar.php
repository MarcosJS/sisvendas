<?php

namespace App\Http\Controllers;

use App\Usuario;

class UsuarioControllerEditar extends Controller
{
    public function editar($id) {
        $usuario = Usuario::find($id);
        if($usuario) {
            return view('usuario_editar', ['usuario' => $usuario]);
        }
    }
}
