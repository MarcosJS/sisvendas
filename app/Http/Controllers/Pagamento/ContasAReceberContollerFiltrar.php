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
        try {
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
        } catch (\Exception $exception) {
            return view('caixa.contasareceber.contas_a_receber', [
                'vales' => [],
                'totalVales' => 0,
                'quantidadeVales' => 0
            ])->withErrors(['erro' => $exception->getMessage()]);
        }

    }

    private function consulta ($dados) {
        $vales = Vale::all();

        if ($dados['vale'] != null) {
            $vales = $vales->where('id', '=', $dados['vale']);
        } else {

            if ($dados['cliente'] != null) {
                $vales = $vales->where('cliente_id', $dados['cliente']);
            }

            if ($dados['lanc_inicio'] != null) {
                $vales = $vales->where('dtlancamento', '>=', $dados['lanc_inicio']);
            }

            if ($dados['lanc_fim'] != null) {
                $vales = $vales->where('dtlancamento', '<=', $dados['lanc_fim']);
            }

            if ($dados['venc_inicio'] != null) {
                $vales = $vales->where('dtvencimento', '>=', $dados['venc_inicio']);
            }

            if ($dados['venc_fim'] != null) {
                $vales = $vales->where('dtvencimento', '<=', $dados['venc_fim']);
            }

            if ($dados['quit_inicio'] != null) {
                $vales = $vales->where('dtquitacao', '>=', $dados['quit_inicio']);
            }

            if ($dados['quit_fim'] != null) {
                $vales = $vales->where('dtquitacao', '<=', $dados['quit_fim']);
            }
        }

        return $vales;
    }
}
