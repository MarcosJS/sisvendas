<?php

namespace App\Http\Controllers\Usuario;

use App\Models\Funcao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioControllerNovo extends Controller
{
    public function novo() {
        $funcoes = Funcao::all();
        return view("usuarios.usuario_novo", ['funcoes'=>$funcoes]);
    }
}
