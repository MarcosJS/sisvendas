<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaControllerItens extends Controller
{
    public function todos(Request $request){
        $produtos = Produto::all();
        $venda = Venda::find($request->session()->get('venda_id'));

        if (!$venda) {
            $venda = new Venda();
        }
        return view('venda.venda_itens', ['produtos' => $produtos, 'venda' => $venda]);
    }
}
