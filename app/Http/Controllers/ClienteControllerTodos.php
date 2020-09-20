<?php

namespace App\Http\Controllers;

use App\Cliente;

class ClienteControllerTodos extends Controller
{
    public function obterTodos() {
        $clientes = Cliente::all();
        return view('clientes.clientes', ['clientes' => $clientes]);
    }
}
