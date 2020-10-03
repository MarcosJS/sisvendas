<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Pagamento\Pagamento;
use App\Models\Pagamento\PagamentoCheque;
use App\Models\Pagamento\PagamentoCrediario;
use App\Models\Pagamento\PagamentoDinheiro;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendasControllerRevisar extends Controller
{
    public function revisar(Request $request) {
        $venda = Venda::find($request->session()->get('venda_id'));
        if(!$venda) {
            return redirect('vendas/itens');
        }
        date_default_timezone_set('America/Recife');
        $venda->dtvenda = date("Y-m-d");
        $venda->hrvenda = date("H:i:s");
        $cliente = Cliente::find($request->cliente);
        $venda->cliente()->associate($cliente);

        $metodopagamento = MetodoPagamento::find($request->metodopagamento);
        /*$metodopg = null;
        switch ($request->metodopagamento){
            case 1:
                $metodopg = new PagamentoDinheiro();
                break;
            case 2:
                $metodopg = new PagamentoCheque();
                break;
            case 3:
                $metodopg = new PagamentoCrediario();
                break;
        }
        $metodopg->valor = ;
        $metodopg->dtpagamento = ;*/

        $venda->metodopagamento()->associate($metodopagamento);
        $venda->desconto = (1 - ($request->desconto / 100));
        $venda->atualizarValores();
        $itens = $venda->vendaItens;

        return view("vendas.vendas_revisao", ['venda' => $venda, 'itens' => $itens, 'cliente'=>$cliente]);

    }
}
