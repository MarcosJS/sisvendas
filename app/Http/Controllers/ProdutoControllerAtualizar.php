<?php

namespace App\Http\Controllers;

use App\Produto;
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
