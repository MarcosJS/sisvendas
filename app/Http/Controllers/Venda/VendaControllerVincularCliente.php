<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Cliente\Cliente;
use App\Models\Venda;
use Illuminate\Support\Facades\Auth;

class VendaControllerVincularCliente extends Controller
{
    public function vincular($id) {
        if(session()->has('venda_id')) {
            $venda = Venda::find(session()->get('venda_id'));
            $cliente =Cliente::find($id);
            $venda->cliente()->associate($cliente);
            $venda->atualizarValores();

            return redirect()->back();
        }
        return redirect()
            ->back()
            ->withErrors(['vinculocliente' => 'Não há nenhuma venda ativa.']);

    }
}
