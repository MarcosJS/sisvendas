<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaControllerItens extends Controller
{
    public function todos(Request $request){
        $venda = new Venda();
        $itens = [];
        if ($request->session()->has('itens')) {
            $itens = $request->session()->get('itens');
        } else {
            $request->session()->put('itens', $itens);
        }
        $produtos = Produto::all();
        return view('vendas.venda_itens', ['produtos' => $produtos, 'itens' => $itens]);
    }
}
