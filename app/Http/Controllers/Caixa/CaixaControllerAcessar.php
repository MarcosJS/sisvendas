<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\Caixa\Turno;
use App\Models\Cliente\Cliente;
use App\Models\Produto\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class CaixaControllerAcessar extends Controller
{
    public function acessar() {
        $caixa = Caixa::first();
        if ($caixa == null) {
            $caixa = new Caixa();
            $caixa->save();
        }
        $turno = Turno::find($caixa->turnoAtual);

        $produtos = Produto::all()->sortBy('nome');
        $venda = Venda::find(Session()->get('venda_id'));
        if (!$venda) {
            $venda = new Venda();
            $venda->totalprodutos = 0;
            $venda->totalliq = 0;
        }
        $clientes = Cliente::all()->sortBy('nome');

        return view('caixa.caixa', [
            'caixa' => $caixa,
            'turno' => $turno,
            'produtos' => $produtos,
            'venda' => $venda,
            'clientes' => $clientes]);
    }
}
