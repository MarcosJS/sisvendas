<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoControllerAcessar extends Controller
{
    public function acessar(Request $request) {
        $produto = Produto::find($request->id);
        return view('produtos.produto', ['produto' => $produto]);
    }
}
