<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioControllerNovo extends Controller
{
    public function novo() {
        return view("novo_usuario");
    }
}
