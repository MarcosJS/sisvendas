<?php

namespace App\Http\Controllers\Cliente;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClienteControllerAcessar extends Controller
{
    public function acessar(Request $request) {
        $usuario = Cliente::find($request->id);
        return view('clientes.cliente', ['cliente' => $usuario]);
    }
}
