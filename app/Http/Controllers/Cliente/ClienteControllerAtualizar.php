<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
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
            return redirect('clientes/acessar'+$cliente->id);
        }
    }
}
