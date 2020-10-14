<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Venda;

class VendaControllerAtivar extends Controller
{
    public function ativar($id) {
        if(!session()->has('venda_id')){
            $venda = Venda::find($id);
            if($venda->statusVenda->id == 1){
                session()->put('venda_id', $id);
                return redirect()->route('itens');
            }
        }
        return redirect()
            ->back()
            ->withErrors(['warning' => 'Voce não pode ativar uma venda com esse status!']);
    }
}
