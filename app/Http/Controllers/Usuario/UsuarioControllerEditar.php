<?php

namespace App\Http\Controllers\Usuario;

use App\Models\Usuario;
use App\Http\Controllers\Controller;

class UsuarioControllerEditar extends Controller
{
    public function editar($id) {
        $usuario = Usuario::find($id);
        if($usuario) {
            return view('usuarios.usuario_editar', ['usuario' => $usuario]);
        }
    }
}
