<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class VendaItemPDVControllerTodos extends Controller
{
    public function obterTodos(Request $request) {
        $cooks = $request->cookie('itens');
        $dadosBrutos = explode("*", $cooks);
        $dados = [];
        for($i = 0; $i < count($dadosBrutos)-1; $i++) {
            $dados[] = explode("-", $dadosBrutos[$i]);
        }
        $produtos = Produto::all();
        return view("sisvendaspdv_itens", ['produtos'=>$produtos, 'itens'=>$dados]);
    }
}
