<?php

namespace App\Http\Controllers\Usuario;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioControllerAtualizar extends Controller
{
    public function atualizar(Request $request) {
        $usuario = Usuario::find($request->idusuario);
        if($usuario) {
            $usuario->nome = $request->nomeusuario;
            $usuario->email = $request->emailusuario;
            $usuario->cpf = $request->cpfusuario;
            $usuario->save();
            return redirect()->route('usuario', $usuario->id);
        } else {
            return 'erro';
        }
    }
}
