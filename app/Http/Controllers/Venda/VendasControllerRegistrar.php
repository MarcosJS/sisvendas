<?php

namespace App\Http\Controllers\Venda;

use App\Auxiliar\CookieAuxiliarDadosItens;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\StatusVenda;
use App\Models\Usuario;
use App\Models\Venda;
use App\Models\VendaItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class VendasControllerRegistrar extends Controller
{
    public function registrar(Request $request)
    {
        /*Recuperando a venda no banco de dados*/
        $venda = Venda::find($request->session()->get('venda_id'));

        /*Alterando o status da venda e apagando a sessao*/
        $status = StatusVenda::where('nomestatus', 'CONCLUIDO')->first();
        $venda->statusVenda()->associate($status);
        $venda->save();
        $request->session()->forget('venda_id');
        return redirect('/');
    }
}
