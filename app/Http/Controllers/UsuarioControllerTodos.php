<?php

namespace App\Http\Controllers;

use App\User;
use App\Usuario;
use Illuminate\Http\Request;

class UsuarioControllerTodos extends Controller
{
    public function obterTodos() {
        $usuarios = Usuario::all();
        return view('usuarios', ['usuarios' => $usuarios]);
    }
}
