<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteControllerRemover extends Controller
{
    public function remover($id) {
        $cliente = Cliente::find($id);
        if($cliente) {
            $cliente->delete();
            return redirect('clientes.clientes');
        }
    }
}
