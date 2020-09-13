<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteControllerAtualizar extends Controller
{
    public function atualizar(Request $request) {
        $cliente = Cliente::find($request->id);
        if($cliente) {
            $cliente->nome = $request->nome;
            $cliente->datanasc = $request->datanasc;
            $cliente->cpf = $request->cpf;
            $cliente->update();
            return redirect('clientes');
        }
    }
}
