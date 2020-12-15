<?php

namespace App\Http\Controllers\Pagamento;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\Caixa\MovimentoCaixa;
use App\Models\Pagamento\Vale;
use Illuminate\Http\Request;

class ContasAReceberContollerFiltrar extends Controller
{
    public function filtrar (Request $request) {
        $vales = $this->consulta($request);

        $totalVales = 0;
        $quantidadeVales = 0;

        foreach ($vales as $v) {
            $totalVales += $v->valor;
            $quantidadeVales++;
        }

        return view('caixa.contasareceber.contas_a_receber', [
            'vales' => $vales,
            'totalVales' => $totalVales,
            'quantidadeVales' => $quantidadeVales
        ]);
    }

    private function consulta ($dados) {
        $vales = Vale::all();

        if ($dados->venda != null) {
            $vales = $vales->whereIn('venda_id', $dados->venda);
        }

        if ($dados->dt_inicio != null) {
            $vales = $vales->where('dtlancamento', '>=', $dados->dt_inicio);
        }

        if ($dados->dt_fim != null) {
            $vales = $vales->where('dtlancamento', '<=', $dados->dt_fim);
        }


        return $vales;
    }
}
