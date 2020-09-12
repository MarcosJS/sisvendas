<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioControllerAtualizar extends Controller
{
    public function atualizar(Request $request) {
        $usuario = Usuario::find($request->id);
        if($usuario) {
            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->funcao = $request->funcao;
            $usuario->update();
            return redirect('usuarios');
        }
    }
}
