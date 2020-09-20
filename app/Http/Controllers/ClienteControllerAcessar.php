<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteControllerAcessar extends Controller
{
    public function acessar(Request $request) {
        $usuario = Cliente::find($request->id);
        return view('clientes.cliente', ['cliente' => $usuario]);
    }
}
