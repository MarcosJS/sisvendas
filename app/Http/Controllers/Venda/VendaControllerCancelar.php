<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\StatusVenda;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaControllerCancelar extends Controller
{
    public function cancelar(Request $request) {
        if($request->session()->has('venda_id')) {
            $status = StatusVenda::where('nomestatus', 'CANCELADO')->first();
            $venda = Venda::find($request->session()->get('venda_id'));
            $venda->statusVenda()->associate($status);
            $venda->save();
            $request->session()->forget('venda_id');
        }

        return redirect()->route('iniciovendas');
    }
}
