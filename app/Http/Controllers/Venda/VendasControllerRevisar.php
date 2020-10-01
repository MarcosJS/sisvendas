<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\MetodoPagamento;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendasControllerRevisar extends Controller
{
    public function revisar(Request $request) {
        $venda = Venda::find($request->venda);
        if(!$venda) {
            return redirect('vendas/itens');
        }
        $venda->dtvenda = date("Y-m-d");
        $venda->hrvenda = date("H:i:s");
        $cliente = Cliente::find($request->cliente);
        $venda->cliente()->associate($cliente);
        $metodopagamento = MetodoPagamento::find($request->metodopagamento);
        $venda->metodopagamento()->associate($metodopagamento);
        $venda->desconto = (1 - ($request->desconto / 100));
        $venda->atualizarValores();
        $itens = $venda->vendaItens;

        return view("vendas.vendas_revisao", ['venda' => $venda, 'itens' => $itens, 'cliente'=>$cliente]);

    }
}
