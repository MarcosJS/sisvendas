<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoControllerAcessar extends Controller
{
    public function acessar(Request $request) {
        $produto = Produto::find($request->id);
        if ($produto != null) {
            $vendas = $produto->vendaItens()->whereHas('venda', function ($q) {
                $q->where('status_venda_id', '=', 2);
            })->sum('qtd');
            $producao = $produto->producao()->sum('quantidade');
            return view('produto.produto', [
                'produto' => $produto,
                'producao' => $producao,
                'vendas' => $vendas]);
        }
        return redirect()->back();
    }
}
