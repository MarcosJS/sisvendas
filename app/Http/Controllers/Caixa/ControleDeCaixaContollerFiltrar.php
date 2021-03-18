<?php

namespace App\Http\Controllers\Caixa;

use App\Auxiliar\ControleDeCaixaAuxiliar;
use App\Http\Controllers\Controller;
use App\Models\Caixa\CatMovCaixa;
use App\Models\Caixa\TipoMovCaixa;
use App\Models\Caixa\Turno;
use App\Models\Pagamento\TipoPagamento;
use Illuminate\Http\Request;

class ControleDeCaixaContollerFiltrar extends Controller
{
    public function filtrar (Request $request) {
        try {
            $movimentos = ControleDeCaixaAuxiliar::consulta($request->all());

            $dados = ControleDeCaixaAuxiliar::analisar($movimentos);

            return ControleDeCaixaAuxiliar::exibirControleDeCaixa('caixa.controle_de_caixa', $dados);

        } catch (\Exception $exception) {
            return view('caixa.controle_de_caixa', [
                'tipoMovimento' => TipoMovCaixa::all(),
                'catMovimento' => CatMovCaixa::all(),
                'tipoPagamento' => TipoPagamento::all(),
                'turno' => Turno::where('id', '=', Session()->get('sistema')->caixa()['turnoAtual'])->first(),
                'movimentos' => [],
                'saldoCaixa' => 0,
                'saldoAnterior' => 0,
                'saldoSaidas' => 0,
                'saldoEntradas' => 0,
                'quantSaidas' => 0,
                'quantEntradas' => 0,
                'dinheiro' => 0,
                'cheque' => 0,
                'transferencia' => 0])
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
