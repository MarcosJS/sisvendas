<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Produto\Produto;

class ProdutoControllerRemover extends Controller
{
    public function remover($id) {
        $produto = Produto::find($id);
        if($produto) {
            $produto->delete();
            return redirect('produto');
        }
    }
}
