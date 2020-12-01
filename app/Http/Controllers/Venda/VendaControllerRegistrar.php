<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\StatusVenda;
use App\Models\Venda;
use App\Validator\FinalizarVendaValidator;
use App\Validator\ValidationException;

class VendaControllerRegistrar extends Controller
{
    public function registrar()
    {
        try {
            FinalizarVendaValidator::validate(['venda_id' => Session()->get('venda_id')]);

            $venda = Venda::find(Session()->get('venda_id'));

            date_default_timezone_set('America/Recife');
            $venda->dtvenda = date("Y-m-d");
            $venda->hrvenda = date("H:i:s");

            /*Alterando o status da venda e apagando a sessao*/
            $status = StatusVenda::find(2);
            $venda->statusVenda()->associate($status);
            $venda->save();
            Session()->forget('venda_id');

            return redirect()
                ->route('listavendas')
                ->with(['success', 'Venda finalizada com sucesso!', 'venda_id' => $venda->id]);

        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
