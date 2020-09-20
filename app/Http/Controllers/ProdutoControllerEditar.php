<?php

namespace App\Http\Controllers;

use App\Produto;

class ProdutoControllerEditar extends Controller
{
    public function editar($id) {
        $produto = Produto::find($id);
        if($produto) {
            return view('produtos.produto_editar', ['produto' => $produto]);
        }
    }
}
