<?php

namespace App\Auxiliar;

use App\Models\Caixa\CatMovCaixa;
use App\Models\Caixa\MovimentoCaixa;
use App\Models\Caixa\TipoMovCaixa;
use App\Models\Pagamento\TipoPagamento;

class ControleDeCaixaAuxiliar
{
    public static function consulta($consulta) {
        if ($consulta != null) {
            $movimentos = MovimentoCaixa::all();

            if ($consulta['movimento'] != null) {
                $movimentos = $movimentos->where('id', '=', $consulta['movimento']);

            } else {
                if ($consulta['turno'] != null) {
                    $movimentos = $movimentos->whereIn('turno_id', $consulta['turno']);
                }

                if ($consulta['tipo'] != null) {
                    $movimentos = $movimentos->whereIn('tipo_mov_caixa_id', $consulta['tipo']);
                }

                if ($consulta['categoria'] != null) {
                    $movimentos = $movimentos->whereIn('cat_mov_caixa_id', $consulta['categoria']);
                }

                if ($consulta['dt_inicio'] != null) {
                    $movimentos = $movimentos->where('dt_movimento', '>=', $consulta['dt_inicio']);
                }

                if ($consulta['dt_fim'] != null) {
                    $movimentos = $movimentos->where('dt_movimento', '<=', $consulta['dt_fim']);
                }

                //Se houver filtro do meio de pagamento
                if($consulta['meio'] != null) {
                    $novosMov = [];
                    foreach ($movimentos as $movimento) {
                        $pagamento = $movimento->pagamento;
                        if ($pagamento->tipoPagamento->id == $consulta['meio']) {
                            $novosMov[] = $movimento;
                        }
                    }
                    $movimentos = $novosMov;
                }
            }
        } else {
            $movimentos = [];
        }

        Session()->put('pesquisaDeImpressao', $consulta);

        //return $movimentos->toArray();
        return $movimentos;
    }

    public static function analisar($movimentos) {
        $caixa = Session()->get('sistema')->caixa();

        $dados['movimentos'] = $movimentos;
        $dados['saldoSaidas'] = 0;
        $dados['quantSaidas'] = 0;
        $dados['saldoEntradas'] = 0;
        $dados['quantEntradas'] = 0;
        $dados['saldoAnterior'] = 0;
        $dados['dinheiro']['entrada'] = 0;
        $dados['cheque']['entrada'] = 0;
        $dados['transferencia']['entrada'] = 0;
        $dados['saldoCaixa'] = $caixa->obterSaldo();
        $dados['turno'] = null;

        if (count($movimentos) > 0) {
            $dados['saldoAnterior'] = $caixa->obterSaldo($movimentos->first());
            $dados['saldoAnterior'] -= $movimentos->first()->valor;
            $dados['turno'] = $movimentos->sortByDesc('id')->first()->turno;
        }

        foreach ($movimentos as $mov) {
            if ($mov->tipoMovCaixa->id == 1) {
                $dados['saldoEntradas'] += $mov->valor;
                $dados['quantEntradas']++;
                if ($mov->pagamento != null) {
                    switch ($mov->pagamento->tipoPagamento->id) {
                        case 1:
                            $dados['dinheiro']['entrada'] += $mov->valor;
                            break;
                        case 2:
                            $dados['cheque']['entrada'] += $mov->valor;
                            break;
                        case 3:
                            $dados['transferencia']['entrada'] += $mov->valor;
                            break;
                    }
                }
            } else {
                $dados['saldoSaidas'] += $mov->valor;
                $dados['quantSaidas']++;
            }
        }

        return $dados;
    }

    public static function exibirControleDeCaixa($view, $dados) {
        return view($view, [
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
    }

}
