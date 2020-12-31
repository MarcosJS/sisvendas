<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\MateriaPrima\MateriaPrima;
use Illuminate\Http\Request;

class MateriaPrimaControllerFluxoEstoque extends Controller
{
    public function fluxo() {
        $materiais = MateriaPrima::all()->sortBy('nome');
        $fluxo = [];
        date_default_timezone_set('America/Recife');
        $todosMateriais = MateriaPrima::sum('estoque');

        $dia = date("Y-m-d");
        $mes = [date("Y-m-1"), date("Y-m-t")];

        foreach ($materiais as $material) {
            $m['produto'] = $material;

            $producaoDia = $material->movimentoEstoquesMat()->where('dtmovimento', '=', $dia)->where('cat_mov_estoque_mat_id', '=', 1)->sum('quantidade');
            $producaoMes = $material->movimentoEstoquesMat()->whereBetween('dtmovimento', $mes)->where('cat_mov_estoque_mat_id', '=', 1)->sum('quantidade');

            $comprasDia = $material->vendaItens()->whereHas('compra', function ($q) use ($dia){
                $q->where('status_compra_id', '=', 2)
                    ->where('dtcompra', '=', $dia);
            })->sum('qtd');
            $comprasMes = $material->vendaItens()->whereHas('compra', function ($q) use ($mes){
                $q->where('status_compra_id', '=', 2)
                    ->whereBetween('dtcompra', $mes);
            })->sum('qtd');

            $m['producaodia'] = $producaoDia;
            $m['producaomes'] = $producaoMes;
            $m['comprasdia'] = $comprasDia;
            $m['comprasmes'] = $comprasMes;
            $m['porcentagem'] = ($material->estoque * 100) / $todosMateriais;
            $fluxo[] = $m;
        }

        return view('material.fluxo_estoque', ['fluxo' => $fluxo]);
    }
}
