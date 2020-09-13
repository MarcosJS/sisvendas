<?php

namespace App\Http\Controllers;

use App\Produto;

class ProdutoControllerRemover extends Controller
{
    public function remover($id) {
        $produto = Produto::find($id);
        if($produto) {
            $produto->delete();
            return redirect('produtos');
        }
    }
}
