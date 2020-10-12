<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaControllerNovo extends Controller
{
    public function novo() {
        if(session()->get('venda_id')) {
            return redirect()->route('pagamento');
        }
        $produtos = Produto::all();
        $venda = new Venda();
        return view('venda.venda_itens', ['produtos' => $produtos, 'venda' => $venda]);
    }
}
