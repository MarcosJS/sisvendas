<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Produto\Produto;

class ProdutoControllerEditar extends Controller
{
    public function editar($id) {
        $produto = Produto::find($id);
        if($produto) {
            return view('produto.produto_editar', ['produto' => $produto]);
        }
    }
}
