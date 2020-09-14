<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class VendaItemPDVControllerCancelar extends Controller
{
    public function cancelar(Request $request) {
        if($request->cookie('itens')) {
            Cookie::queue(Cookie::forget('itens'));
        }
        return redirect('sisvendaspdv');
    }
}
