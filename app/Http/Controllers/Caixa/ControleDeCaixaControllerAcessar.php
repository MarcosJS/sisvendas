<?php

namespace App\Http\Controllers\Caixa;

use App\Auxiliar\ControleDeCaixaAuxiliar;
use App\Http\Controllers\Controller;
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
            } else {
                $movimentos = [];
            }

            $dados = ControleDeCaixaAuxiliar::analisar($movimentos);

            return view('caixa.controle_de_caixa', [
                'tipoMovimento' => TipoMovCaixa::all(),
                'catMovimento' => CatMovCaixa::all(),
                'tipoPagamento' => TipoPagamento::all(),
                'turno' => $dados['turno'],
                'movimentos' => $dados['movimentos'],
                'saldoCaixa' => $dados['saldoCaixa'],
                'saldoAnterior' => $dados['saldoAnterior'],
                'saldoSaidas' => $dados['saldoSaidas'],
                'saldoEntradas' => $dados['saldoEntradas'],
                'quantSaidas' => $dados['quantSaidas'],
                'quantEntradas' => $dados['quantEntradas'],
                'dinheiro' => $dados['dinheiro'],
                'cheque' => $dados['cheque'],
                'transferencia' => $dados['transferencia']
            ]);
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
