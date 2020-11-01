<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Produto\Produto;
use Illuminate\Http\Request;

class ProdutoControllerFluxoEstoque extends Controller
{
    public function fluxo() {
        $produtos = Produto::all()->sortBy('nome');
        $fluxo = [];
        date_default_timezone_set('America/Recife');
        $todosProdutos = Produto::sum('estoque');

        $dia = date("Y-m-d");
        $mes = [date("Y-m--1"), date("Y-m-t")];

        foreach ($produtos as $prod) {
            $p['produto'] = $prod;

            $producaoDia = $prod->movimentoEstoques()->where('dtmovimento', '=', $dia)->sum('quantidade');
            $producaoMes = $prod->movimentoEstoques()->whereBetween('dtmovimento', $mes)->sum('quantidade');

            $vendasDia = $prod->vendaItens()->whereHas('venda', function ($q) use ($dia){
                $q->where('status_venda_id', '=', 2)
                    ->where('dtvenda', '=', $dia);
            })->sum('qtd');
            $vendasMes = $prod->vendaItens()->whereHas('venda', function ($q) use ($mes){
                $q->where('status_venda_id', '=', 2)
                    ->whereBetween('dtvenda', $mes);
            })->sum('qtd');

            $p['producaodia'] = $producaoDia;
            $p['producaomes'] = $producaoMes;
            $p['vendasdia'] = $vendasDia;
            $p['vendasmes'] = $vendasMes;
            $p['porcentagem'] = ($prod->estoque * 100) / $todosProdutos;
            $fluxo[] = $p;
        }

        return view('produto.fluxo_estoque', ['fluxo' => $fluxo]);
    }
}
