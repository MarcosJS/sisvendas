<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Endereco;
use App\Telefone;
use Illuminate\Http\Request;

class ClienteControllerAdicionar extends Controller
{
    public function adicionar(Request $request) {
        $cliente = new Cliente();
        $cliente->fill($request->all());
        $cliente->save();

        $endereco = new Endereco();
        $endereco->fill($request->all());
        $cliente->endereco()->save($endereco);

        $telefone = new Telefone();

        $telefone->fill($request->all());
        $cliente->telefone()->saveMany([$telefone]);
        return redirect('clientes');
    }
}
