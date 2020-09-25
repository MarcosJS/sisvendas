<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;

class ClienteControllerTodos extends Controller
{
    public function obterTodos() {
        $clientes = Cliente::all();
        return view('clientes.clientes', ['clientes' => $clientes]);
    }
}
