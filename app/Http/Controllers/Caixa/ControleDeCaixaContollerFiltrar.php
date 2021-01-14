<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\Caixa\CatMovCaixa;
use App\Models\Caixa\MovimentoCaixa;
use App\Models\Caixa\TipoMovCaixa;
use App\Models\Pagamento\TipoPagamento;
use Illuminate\Http\Request;

class ControleDeCaixaContollerFiltrar extends Controller
{
    public function filtrar (Request $request) {
        try {
            //return $request->all();
            $movimentos = $this->consulta($request->all());

            $saldoAnterior = 0;

            $caixa = Session()->get('sistema')->caixa();
            $saldoCaixa = $caixa->obterSaldo();

            if (count($movimentos) > 0) {
                $saldoAnterior = $caixa->obterSaldo($movimentos->first());
                $saldoAnterior -= $movimentos->first()->valor;
            }

            $saldoSaidas = 0;
            $quantSaidas = 0;
            $saldoEntradas = 0;
            $quantEntradas = 0;

            $dinheiro['entrada'] = 0;
            $cheque['entrada'] = 0;
            $transferencia['entrada'] = 0;

            $turno = $movimentos->sortByDesc('id')->first()->turno;

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

            foreach ($movimentos as $mov) {
                if ($mov->tipoMovCaixa->id == 1) {
                    $saldoEntradas += $mov->valor;
                    $quantEntradas++;
                    if ($mov->pagamento != null) {
                        switch ($mov->pagamento->tipoPagamento->id) {
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
                'turno' => $turno,
                'movimentos' => $movimentos,
                'saldoCaixa' => $saldoCaixa,
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
            return view('caixa.controle_de_caixa', [
                'tipoMovimento' => TipoMovCaixa::all(),
                'catMovimento' => CatMovCaixa::all(),
                'tipoPagamento' => TipoPagamento::all(),
                'turno' => $caixa->turnos->where('id', '=', $caixa['turnoAtual'])->first(),
                'movimentos' => $movimentos,
                'saldoCaixa' => $saldoCaixa,
                'saldoAnterior' => $saldoAnterior,
                'saldoSaidas' => $saldoSaidas,
                'saldoEntradas' => $saldoEntradas,
                'quantSaidas' => $quantSaidas,
                'quantEntradas' => $quantEntradas,
                'dinheiro' => $dinheiro,
                'cheque' => $cheque,
                'transferencia' => $transferencia])
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }

    private function consulta ($dados) {
        $movimentos = MovimentoCaixa::all();

        if ($dados['movimento'] != null) {
            $movimentos = $movimentos->where('id', '=', $dados['movimento']);

        } else {
            if ($dados['turno'] != null) {
                $movimentos = $movimentos->whereIn('turno_id', $dados['turno']);
            }

            if ($dados['tipo'] != null) {
                $movimentos = $movimentos->whereIn('tipo_mov_caixa_id', $dados['tipo']);
            }

            if ($dados['categoria'] != null) {
                $movimentos = $movimentos->whereIn('cat_mov_caixa_id', $dados['categoria']);
            }

            if ($dados['dt_inicio'] != null) {
                $movimentos = $movimentos->where('dt_movimento', '>=', $dados['dt_inicio']);
            }

            if ($dados['dt_fim'] != null) {
                $movimentos = $movimentos->where('dt_movimento', '<=', $dados['dt_fim']);
            }
        }

        return $movimentos;
    }
}
