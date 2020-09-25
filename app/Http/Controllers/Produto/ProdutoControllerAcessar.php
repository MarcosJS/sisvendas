<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoControllerAcessar extends Controller
{
    public function acessar(Request $request) {
        $produto = Produto::find($request->id);
        return view('produtos.produto', ['produto' => $produto]);
    }
}
