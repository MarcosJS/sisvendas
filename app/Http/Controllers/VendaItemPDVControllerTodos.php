<?php

namespace App\Http\Controllers;

use App\Auxiliar\CookieAuxiliarDadosItens;
use App\Produto;
use Illuminate\Http\Request;

class VendaItemPDVControllerTodos extends Controller
{
    public function obterTodos(Request $request) {
        $cooks = $request->cookie('itens');
        $itens = CookieAuxiliarDadosItens::converteParaArray($cooks);
        $produtos = Produto::all();
        return view("sisvendaspdv_itens", ['produtos'=>$produtos, 'itens'=>$itens]);
    }
}
