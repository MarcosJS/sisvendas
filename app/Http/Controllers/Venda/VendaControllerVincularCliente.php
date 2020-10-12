<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Venda;

class VendaControllerVincularCliente extends Controller
{
    public function vincular($id) {
        $venda = Venda::find(session()->get('venda_id'));
        $cliente =Cliente::find($id);
        $venda->cliente()->associate($cliente);
        $venda->save();
        return redirect()->back();
    }
}
