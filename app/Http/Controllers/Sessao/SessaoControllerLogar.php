<?php

namespace App\Http\Controllers\Sessao;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class SessaoControllerLogar extends Controller
{
    public function logar(Request $request) {
        $usuario = Usuario::find($request->usuario_id);
        if ($usuario) {
            $request->session()->put('usuario_id', $usuario->id);
            $request->session()->put('usuario_nome', $usuario->nome);
            $request->session()->put('usuario_nivel', $usuario->funcao->nivel);
            $request->session()->put('usuario_funcao', $usuario->funcao->nomefuncao);
            return redirect('/');
        }

    }
}
