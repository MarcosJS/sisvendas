<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\Caixa\Turno;

use App\Models\Pagamento\Vale;

class CaixaControllerQuitacaoVale extends Controller
{
    public function quitacao ($id) {

        try {
            $caixa = Session()->get('sistema')->caixa();
            if ($caixa == null) {
                $caixa = new Caixa();
                $caixa->save();
            }
            $turno = Turno::find($caixa->turnoAtual);

            $vale = Vale::find($id);
            $cliente = $vale->venda->cliente;
            $creditoCliente = 0;
            $total = $vale['valor'];

            if ($cliente->saldoCredito() > 0) {
                if ($cliente->saldoCredito() > $vale['valor']) {
                    $creditoCliente = $vale['valor'];
                    $total = 0;
                } else {
                    $creditoCliente = $cliente->saldoCredito();
                    $total = $vale['valor'] - $creditoCliente;
                }

            }

            return view('caixa.quitacao_vale', [
                'caixa' => $caixa,
                'turno' => $turno,
                'total' => $total,
                'vale' => $vale,
                'pagamentos' => $vale->pagamentos,
                'cliente' => $cliente,
                'creditoCliente' => $creditoCliente,
                'venda' => null
            ]);

        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
