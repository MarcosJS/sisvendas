<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioControllerAdicionar extends Controller
{
    public function adicionar(Request $request) {
        //return $request;
        $usuario = new Usuario();
        $usuario->fill($request->all());
        if($usuario) {
            $usuario->save();
            return redirect('usuarios');
        }
    }
}
