<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaControllerNovo extends Controller
{
    public function novo() {
        session()->forget('venda_id');
        $produtos = Produto::all()->sortBy('nome');
        $venda = new Venda();
        return view('venda.venda_itens', ['produtos' => $produtos, 'venda' => $venda]);
    }
}
