<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaControllerAplicarDesconto extends Controller
{
    public function aplicar(Request $request) {
        if ($request->session()->has('venda_id')){
            $venda = Venda::find($request->session()->get('venda_id'));
            $venda->desconto = (1 - ($request->desconto / 100));
            $venda->atualizarValores();

            return redirect()->back();
        } else {
            return redirect()
                ->back()
                ->withErrors(['venda_id' => 'Não há nenhuma venda ativa.']);
        }

    }
}
