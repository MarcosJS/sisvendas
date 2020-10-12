<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;

class VendaControllerAtivar extends Controller
{
    public function ativar($id) {
        if(!session()->has('venda_id')){
            session()->put('venda_id', $id);
            return redirect()->route('itens');
        }
        return redirect()->route('acesar', $id);
    }
}
