<?php

namespace App\Http\Controllers;


class ProdutoControllerNovo extends Controller
{
    public function novo() {
        return view("produto_novo");
    }
}
