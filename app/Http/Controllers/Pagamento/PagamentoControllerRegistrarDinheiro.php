<?php

namespace App\Http\Controllers\Pagamento;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\Pagamento\Cheque;
use App\Models\Pagamento\Emitente;
use App\Models\Pagamento\Pagamento;
use App\Models\Venda;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class PagamentoControllerRegistrarDinheiro extends Controller
{
    public function registrar(Request $request) {
        if (Session()->has('venda_id')) {
            $venda = Venda::find(Session()->get('venda_id'));

            $pagamento = new Pagamento();
            $pagamento->tipo = 'DINHEIRO';
            $pagamento->valor = $request['dinheiro'];
            date_default_timezone_set('America/Recife');
            $pagamento->dtpagamento = date("Y-m-d");
            $pagamento->venda()->associate($venda);

            $caixa = Caixa::first();
            $pagamento->concluir($caixa);

            return redirect()->back();
        } else {
            return redirect()
                ->back()
                ->withErrors(['venda_id' => 'Nenhuma venda foi iniciada ainda!']);
        }
    }
}
