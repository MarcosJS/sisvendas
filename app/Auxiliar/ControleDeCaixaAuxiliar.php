<?php


namespace App\Auxiliar;


use App\Models\Caixa\MovimentoCaixa;

class ControleDeCaixaAuxiliar
{
    public static function consulta ($dados) {
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

}
