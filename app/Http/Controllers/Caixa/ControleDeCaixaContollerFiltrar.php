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

            //Se houver filtro do meio de pagamento
            if($request['meio'] != null) {
                $novosMov = [];
                foreach ($movimentos as $movimento) {
                    $pagamento = $movimento->pagamento;
                    if ($pagamento->tipoPagamento->id == $request['meio']) {
                        $novosMov[] = $movimento;
                    }
                }
                $movimentos = $novosMov;
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
