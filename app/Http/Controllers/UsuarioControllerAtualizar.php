<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioControllerAtualizar extends Controller
{
    public function atualizar(Request $request) {
        $usuario = Usuario::find($request->idusuario);
        if($usuario) {
            $usuario->nome = $request->nomeusuario;
            $usuario->email = $request->emailusuario;
            $usuario->funcao = $request->funcaousuario;
            $usuario->update();
            return redirect('usuarios');
        }
    }
}
