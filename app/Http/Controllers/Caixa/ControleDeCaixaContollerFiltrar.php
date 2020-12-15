<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\Caixa\MovimentoCaixa;
use Illuminate\Http\Request;

class ControleDeCaixaContollerFiltrar extends Controller
{
    public function filtrar (Request $request) {
        $movimentos = $this->consulta($request);

        $caixa = Caixa::first();
        $saldoCaixa = $caixa->obterSaldo();
        $saldoAnterior = $caixa->obterSaldo($movimentos->first());
        $saldoAnterior -= $movimentos->first()->valor;

        $saldoSaidas = 0;
        $quantSaidas = 0;
        $saldoEntradas = 0;
        $quantEntradas = 0;

        $dinheiro['entrada'] = 0;
        $cheque['entrada'] = 0;
        $transferencia['entrada'] = 0;

        foreach ($movimentos as $mov) {
            if ($mov->tipoMovCaixa->id == 1) {
                $saldoEntradas += $mov->valor;
                $quantEntradas++;
                if ($mov->pagamento != null) {
                    switch($mov->pagamento->tipo) {
                        case 'DINHEIRO':
                            $dinheiro['entrada'] += $mov->valor;
                            break;
                        case 'CHEQUE':
                            $cheque['entrada'] += $mov->valor;
                            break;
                        case 'TRANSFERENCIA':
                            $transferencia['entrada'] += $mov->valor;
                            break;
                    }
                }
            } else {
                $saldoSaidas += $mov->valor;
                $quantSaidas++;
            }
        }

        return view('caixa.controle_de_caixa', [
            'turno' => $movimentos->sortByDesc('id')->first()->turno,
            'movimentos' => $movimentos,
            'saldoCaixa' =>$saldoCaixa,
            'saldoAnterior' => $saldoAnterior,
            'saldoSaidas' => $saldoSaidas,
            'saldoEntradas' => $saldoEntradas,
            'quantSaidas' => $quantSaidas,
            'quantEntradas' => $quantEntradas,
            'dinheiro' => $dinheiro,
            'cheque' => $cheque,
            'transferencia' => $transferencia
        ]);
    }

    private function consulta ($dados) {
        $movimentos = MovimentoCaixa::all();

        if ($dados->turno != null) {
            $movimentos = $movimentos->whereIn('turno_id', $dados->turno);
        }

        if ($dados->dt_inicio != null) {
            $movimentos = $movimentos->where('dt_movimento', '>=', $dados->dt_inicio);
        }

        if ($dados->dt_fim != null) {
            $movimentos = $movimentos->where('dt_movimento', '<=', $dados->dt_fim);
        }


        return $movimentos;
    }
}
