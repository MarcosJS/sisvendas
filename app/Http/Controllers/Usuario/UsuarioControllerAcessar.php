<?php

namespace App\Http\Controllers\Usuario;


use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioControllerAcessar extends Controller
{
    public function acessar(Request $request) {
        $usuario = Usuario::find($request->id);
        return view('usuarios.usuario', ['usuario' => $usuario]);
    }
}
