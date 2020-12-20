<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente\Cliente;

class ClienteControllerEditar extends Controller
{
    public function editar($id) {
        $cliente = Cliente::find($id);
        if($cliente) {
            return view('clientes.cliente_editar', ['cliente' => $cliente]);
        }
    }
}
