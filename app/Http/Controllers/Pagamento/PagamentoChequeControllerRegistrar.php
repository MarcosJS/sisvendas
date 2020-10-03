<?php

namespace App\Http\Controllers\Pagamento;

use App\Http\Controllers\Controller;
use App\Models\Pagamento\Cheque;
use App\Models\Pagamento\PagamentoCheque;
use App\Models\Venda;
use Illuminate\Http\Request;

class PagamentoChequeControllerRegistrar extends Controller
{
    public function registrar(Request $request) {
        //return $request;
        $pagamento = new PagamentoCheque();
        $pagamento->valor = $request->valor;

        $cheque = new Cheque();
        $cheque->numero = $request->numerocheque;

        $venda = Venda::find($request->session()->get('venda_id'));
        $pagamento->venda()->associate($venda);
        $pagamento->save();
        $cheque->pagamento()->associate($pagamento);
        $cheque->save();


        return redirect('vendas/pagamento');
    }
}
