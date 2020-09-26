<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaControllerNovo extends Controller
{
    public function novo() {
        $produtos = Produto::all();
        $venda = new Venda();
        return view('vendas.venda_itens', ['produtos' => $produtos, 'venda' => $venda]);
    }
}
