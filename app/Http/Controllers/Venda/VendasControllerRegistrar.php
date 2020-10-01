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
        $venda = Venda::find($request->venda_id);

        /*Alterando o status da venda*/
        $status = StatusVenda::where('nomestatus', 'CONCLUIDO')->first();
        $venda->statusvenda()->associate($status);
        return redirect('/');
    }
}
