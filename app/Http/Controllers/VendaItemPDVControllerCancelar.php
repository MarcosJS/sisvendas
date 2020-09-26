<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendaItemPDVControllerCancelar extends Controller
{
    public function cancelar(Request $request) {
        if($request->session()->has('itens')) {
            $request->session()->forget('itens');
        }
        return redirect('sisvendaspdv');
    }
}
