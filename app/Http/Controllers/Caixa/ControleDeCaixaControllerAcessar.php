<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;

use App\Models\Caixa\Caixa;
use App\Models\Caixa\CatMovCaixa;
use App\Models\Caixa\TipoMovCaixa;
use App\Models\Caixa\Turno;
use App\Models\Pagamento\TipoPagamento;

class ControleDeCaixaControllerAcessar extends Controller
{
    public function acessar() {
        try{
            $ultimoTurno = Turno::orderByDesc('id')->first();

            if ($ultimoTurno != null) {
                $movimentos = $ultimoTurno->movimentos->sortByDesc('id');
                $saldoAnterior = $ultimoTurno['saldo_anterior'];
            } else {
                $movimentos = [];
                $saldoAnterior = 0;
            }

            $caixa = Session()->get('sistema')->caixa();
            $saldoCaixa = $caixa->obterSaldo();


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
                        switch($mov->pagamento->tipoPagamento->id) {
                            case 1:
                                $dinheiro['entrada'] += $mov->valor;
                                break;
                            case 2:
                                $cheque['entrada'] += $mov->valor;
                                break;
                            case 3:
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
                'tipoMovimento' => TipoMovCaixa::all(),
                'catMovimento' => CatMovCaixa::all(),
                'tipoPagamento' => TipoPagamento::all(),
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
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
