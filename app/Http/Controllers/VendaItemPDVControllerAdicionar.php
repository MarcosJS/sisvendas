<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendaItemPDVControllerAdicionar extends Controller
{

    public function adicionar(Request $request) {
        $cook = $request['codproduto']."-".$request['nomeproduto']."-".$request['qtd']."-".$request['precofinal']."-".($request['precofinal']*$request['qtd']."*");
        $cooks = $request->cookie('itens');
        $cooks = $cooks.$cook;
        $cookie = cookie('itens',$cooks, 30);
        return redirect('sisvendaspdvitens')->cookie($cookie);
    }
}
