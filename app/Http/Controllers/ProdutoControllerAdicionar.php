<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoControllerAdicionar extends Controller
{
    public function adicionar(Request $request) {
        $produto = new Produto();
        $produto->fill($request->all());
        if($produto) {
            $produto->save();
            return redirect('produtos');
        }
    }
}
