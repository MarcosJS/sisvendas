<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\MateriaPrima\MateriaPrima;
use Illuminate\Http\Request;

class MateriaPrimaControllerAcessar extends Controller
{
    public function acessar(Request $request) {
        $material = MateriaPrima::find($request->id);
        if ($material != null) {
            /*$compras = $material->vendaItens()->whereHas('venda', function ($q) {
                $q->where('status_venda_id', '=', 2);
            })->sum('qtd');
            $producao = $material->movimentoEstoques()->whereHas('catMovEstoque', function ($q) {
                $q->where('nome', '=', 'ENTRADA PRODUCAO');
            })->sum('quantidade');*/

            return view('material.material', [
                'material' => $material/*,
                'producao' => $producao,
                'compras' => $compras*/]);
        }
        return redirect()->back();
    }
}
