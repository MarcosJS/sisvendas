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
            $saidas = $material->movimentosEstoqueMat()->whereHas('tipoMovEstoqueMat', function ($q) {
                $q->where('id', '=', 2);
            })->count();
            $entradas = $material->movimentosEstoqueMat()->whereHas('tipoMovEstoqueMat', function ($q) {
                $q->where('id', '=', 1);
            })->count();

            return view('material.material', [
                'material' => $material,
                'entradas' => $entradas,
                'saidas' => $saidas]);
        }
        return redirect()->back();
    }
}
