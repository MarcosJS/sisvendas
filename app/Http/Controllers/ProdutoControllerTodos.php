<?php

namespace App\Http\Controllers;

use App\Produto;

class ProdutoControllerTodos extends Controller
{
    public function obterTodos() {
        $produtos = Produto::all();
        return view('produtos.produtos', ['produtos' => $produtos]);
    }
}
