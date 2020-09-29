<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\MetodoPagamento;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendasControllerPagamento extends Controller
{
    public function pagamento(Request $request) {
        $clientes = Cliente::all();
        $venda = Venda::find($request->session()->get('venda_id'));
        $metodospg = MetodoPagamento::all();

        if($venda) {
            return view("vendas.vendas_pagamento", [
                'clientes' => $clientes,
                'venda' => $venda,
                'metodospg' => $metodospg]);
        }

        return redirect('vendas/itens');
    }
}
