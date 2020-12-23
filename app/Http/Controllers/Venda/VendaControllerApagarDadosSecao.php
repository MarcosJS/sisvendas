<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;

class VendaControllerApagarDadosSecao extends Controller
{
    public function apagarDados() {
        Session()->forget('excedente');
        Session()->forget('venda_id');
        return redirect()->back();
    }
}
