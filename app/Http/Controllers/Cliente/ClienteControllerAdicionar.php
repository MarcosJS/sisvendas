<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Telefone;
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
