<?php

namespace App\Http\Controllers\Usuario;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioControllerTodos extends Controller
{
    public function obterTodos(Request $request) {
        $usuarios = Usuario::all();
        return view('usuarios.usuarios', ['usuarios' => $usuarios]);
    }
}
