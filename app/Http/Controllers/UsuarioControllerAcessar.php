<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioControllerAcessar extends Controller
{
    public function acessar(Request $request) {
        $usuario = Usuario::find($request->id);
        return view('usuario', ['usuario' => $usuario]);
    }
}
