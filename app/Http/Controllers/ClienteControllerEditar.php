<?php

namespace App\Http\Controllers;


use App\Cliente;

class ClienteControllerEditar extends Controller
{
    public function editar($id) {
        $cliente = Cliente::find($id);
        if($cliente) {
            return view('clientes.cliente_editar', ['cliente' => $cliente]);
        }
    }
}
