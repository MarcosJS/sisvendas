<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\StatusVenda;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendasControllerRegistrar extends Controller
{
    public function registrar(Request $request)
    {
        if($request->session()->has('venda_id')) {
            /*Recuperando a venda no banco de dados*/
            $venda = Venda::find($request->session()->get('venda_id'));

            if ($venda->valida) {
                /*Alterando o status da venda e apagando a sessao*/
                $status = StatusVenda::where('nomestatus', 'CONCLUIDO')->first();
                $venda->statusVenda()->associate($status);
                $venda->save();
                $request->session()->forget('venda_id');
                return redirect()
                    ->route('listavendas')
                    ->with(['success', 'Venda finalizada com sucesso!', 'venda_id' => $venda->id]);
            }

        }
        return redirect()->back();

    }
}
