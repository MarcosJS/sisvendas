<?php

namespace App\Http\Controllers\Pagamento;

use App\Http\Controllers\Controller;
use App\Models\Pagamento\Vale;
use App\Models\Venda;
use Illuminate\Http\Request;

class PagamentoControllerRegistrarVale extends Controller
{
    public function registrar(Request $request) {
        $erro = [];
        if (Session()->has('venda_id')) {
            $venda = Venda::find(Session()->get('venda_id'));

            if ($venda->cliente != null) {
                if($venda->cliente->modcredito) {
                    $vale = new Vale();
                    $vale['valor'] = $request['vale'];
                    date_default_timezone_set('America/Recife');
                    $vale['dtlancamento'] = date("Y-m-d");
                    $vale['dtvencimento'] = $request['dtvencimento'];
                    $vale->cliente()->associate($venda->cliente);
                    $vale->venda()->associate($venda);
                    $vale->save();

                    return redirect()->back();
                } else {
                    $erro = ['cliente_id' => 'O cliente não tem permissão para comprar no vale'];
                }

            } else {
                $erro = ['cliente_id' => 'Nenhum cliente cadastrado esta vinculado à venda'];
            }

        } else {
             $erro = ['venda_id' => 'Nenhuma venda foi iniciada ainda'];
        }
        return redirect()
            ->back()
            ->withErrors($erro);
    }
}
