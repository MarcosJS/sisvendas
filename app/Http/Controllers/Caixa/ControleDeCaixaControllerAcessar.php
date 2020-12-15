<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;

use App\Models\Caixa\Caixa;
use App\Models\Caixa\Turno;

class ControleDeCaixaControllerAcessar extends Controller
{
    public function acessar() {
        $ultimoTurno = Turno::orderByDesc('id')->first();
        $movimentos = $ultimoTurno->movimentos->sortByDesc('id');
        $caixa = Caixa::first();
        $saldoCaixa = $caixa->obterSaldo();
        $saldoAnterior = $ultimoTurno['saldo_anterior'];

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
            'turno' => $ultimoTurno,
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
}
