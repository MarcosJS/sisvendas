<?php

namespace App\Http\Controllers\Sessao;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class SessaoControllerLogar extends Controller
{
    public function logar(Request $request) {
        $usuario = Usuario::find($request->usuario_id);
        $usuario->senha = "";
        if ($usuario) {
            $request->session()->put('usuario', $usuario);
            return redirect('/');
        }

    }
}
