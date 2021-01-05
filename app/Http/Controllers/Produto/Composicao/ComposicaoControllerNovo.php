<?php

namespace App\Http\Controllers\Produto\Composicao;

use App\Http\Controllers\Controller;
use App\Models\MateriaPrima\MateriaPrima;
use App\Models\Produto\Produto;
use Illuminate\Http\Request;

class ComposicaoControllerNovo extends Controller
{
    public function novo($id) {
        $produto = Produto::find($id);
        $materiais = MateriaPrima::all();
        $itens = [];

        if (Session()->has('itens')) {
            $itens = Session()->get('itens');
            if ($itens[0]['produto']->id != $produto->id) {
                Session()->forget('itens');
                $itens = [];
            }
        }

        return view("produto.composicao_novo", [
            'produto' => $produto,
            'materiais' => $materiais,
            'itens' => $itens]);
    }
}
