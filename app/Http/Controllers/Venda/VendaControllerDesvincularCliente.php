<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaControllerDesvincularCliente extends Controller
{
    public function desvincular() {
        if(session()->has('venda_id')) {
            $venda = Venda::find(session()->get('venda_id'));
            if($venda->cliente != null) {
                $venda->cliente()->dissociate();
                $venda->save();
            }
        }
        return redirect()->back();
    }
}
