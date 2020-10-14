<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaControllerTodos extends Controller
{
    public function obterTodos(Request $request) {
        $venda = null;

        if($request['venda_id']){
            $venda = Venda::find($request['venda_id']);
        }
        $vendas = Venda::all();

        return view('venda.vendas', [
            'success' => $request->success,
            'venda' => $venda,
            'vendas' => $vendas]);
    }
}
