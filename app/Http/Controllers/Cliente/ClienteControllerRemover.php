<?php

namespace App\Http\Controllers\Cliente;

use App\Models\Cliente\Cliente;
use App\Http\Controllers\Controller;
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
