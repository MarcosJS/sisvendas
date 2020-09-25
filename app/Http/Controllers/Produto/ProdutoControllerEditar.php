<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Produto;

class ProdutoControllerEditar extends Controller
{
    public function editar($id) {
        $produto = Produto::find($id);
        if($produto) {
            return view('produtos.produto_editar', ['produto' => $produto]);
        }
    }
}
