<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Produto;

class ProdutoControllerTodos extends Controller
{
    public function obterTodos() {
        $produtos = Produto::all();
        return view('produto.produtos', ['produtos' => $produtos]);
    }
}
