<?php

namespace App\Http\Controllers\Cliente;

use App\Models\Cliente\Cliente;
use App\Http\Controllers\Controller;

class ClienteControllerAcessar extends Controller
{
    public function acessar($id) {
        $cliente = Cliente::find($id);
        if ($cliente != null) {
            $vendas = $cliente->vendas->count();

            $contasAReceber = [];
            foreach ($cliente->vendas as $venda) {
                $vales = $venda->vales()->doesntHave('pagamento')->get();
                foreach ($vales as $vale) {
                    array_push($contasAReceber, $vale);
                }
            }

            return view('clientes.cliente', [
                'cliente' => $cliente,
                'vendas' => $vendas,
                'contasAReceber' => count($contasAReceber)
            ]);
        } else {
            return redirect()->route('clientes');
        }
    }
}
