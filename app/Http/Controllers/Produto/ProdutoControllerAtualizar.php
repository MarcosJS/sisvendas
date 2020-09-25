<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoControllerAtualizar extends Controller
{
    public function atualizar(Request $request)
    {
        $produto = Produto::find($request->id);
        if ($produto) {
            $produto->nome = $request->nome;
            $produto->descricao = $request->descricao;
            $produto->estoque = $request->estoque;
            $produto->preco = $request->preco;
            $produto->update();
            return redirect('produtos');
        }
    }
}
