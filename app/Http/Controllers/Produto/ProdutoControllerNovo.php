<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;

class ProdutoControllerNovo extends Controller
{
    public function novo() {
        return view("produto.produto_novo");
    }
}
