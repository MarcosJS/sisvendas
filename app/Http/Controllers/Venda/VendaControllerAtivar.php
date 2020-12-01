<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Venda;

class VendaControllerAtivar extends Controller
{
    public function ativar($id) {
        $erro = null;
        if(!session()->has('venda_id')){
            $venda = Venda::find($id);
            $status = $venda->statusVenda->id;
            if($status == 1 || $status == 3){
                session()->put('venda_id', $id);
                return redirect()->route('caixa');
            } else {
                $erro = ['warning' => 'Voce não pode ativar uma venda com esse status!'];
            }
        }else {
            $erro = ['warning' => 'Já existe uma venda ativa!'];
        }
        return redirect()
            ->back()
            ->withErrors($erro);
    }
}
