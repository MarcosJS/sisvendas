<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\StatusVenda;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaControllerCancelar extends Controller
{
    public function cancelar(Request $request) {
        $id = $request->session()->get('venda_id');
        $status = StatusVenda::where('nomestatus', 'CANCELADO')->first();
        if($id) {
            $venda = Venda::find($id);
            $venda->statusVenda()->associate($status);
            $venda->save();
            $request->session()->forget('venda_id');
        }
        return redirect('sisvendaspdv');
    }
}
