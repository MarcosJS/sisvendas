<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoControllerFluxoEstoque extends Controller
{
    public function fluxo() {
        $produtos = Produto::all()->sortBy('nome');
        $fluxo = [];
        date_default_timezone_set('America/Recife');
        $todosProdutos = Produto::sum('estoque');

        foreach ($produtos as $prod) {
            $p['produto'] = $prod;
            $vendasDia = $prod->vendaItens()->whereHas('venda', function ($q) {
                $date = date("Y-m-d");
                $q->where('dtvenda', '=', $date);
            })->count();
            $vendasMes = $prod->vendaItens()->whereHas('venda', function ($q) {
                $inicio = date("Y-m--1");
                $fim = date("Y-m-t");
                $q->whereBetween('dtvenda', [$inicio, $fim]);
            })->count();
            $p['vendasdia'] = $vendasDia;
            $p['vendasmes'] = $vendasMes;
            $p['porcentagem'] = ($prod->estoque * 100) / $todosProdutos;
            $fluxo[] = $p;
        }

        return view('produto.fluxo_estoque', ['fluxo' => $fluxo]);
    }
}
