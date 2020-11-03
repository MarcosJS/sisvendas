<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\StatusVenda;
use App\Models\Venda;
use App\Validator\RevisaoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class VendaControllerRegistrar extends Controller
{
    public function registrar(Request $request)
    {
        if($request->session()->has('venda_id')) {
            try {
                $venda = Venda::find($request->session()->get('venda_id'));

                RevisaoValidator::validate(['venda_id' =>$venda->id, 'pagamento' => $venda->pagamentos]);

                date_default_timezone_set('America/Recife');
                $venda->dtvenda = date("Y-m-d");
                $venda->hrvenda = date("H:i:s");

                /*Alterando o status da venda e apagando a sessao*/
                $status = StatusVenda::find(2);
                $venda->statusVenda()->associate($status);
                $venda->valida = true;
                $venda->save();
                $request->session()->forget('venda_id');

                return redirect()
                    ->route('listavendas')
                    ->with(['success', 'Venda finalizada com sucesso!', 'venda_id' => $venda->id]);

            } catch (ValidationException $exception) {
                return redirect()->route('pagamento')
                    ->withErrors($exception->getValidator())
                    ->withInput();
            }
        } else {
            return redirect()
                ->route('itens')
                ->withErrors(['venda_id' => 'Nenhuma venda foi iniciada ainda']);
        }

        /*if($request->session()->has('venda_id')) {
            //Recuperando a venda no banco de dados
            $venda = Venda::find($request->session()->get('venda_id'));

            if ($venda->valida) {
                //Alterando o status da venda e apagando a sessao
                $status = StatusVenda::where('nomestatus', 'CONCLUIDO')->first();
                $venda->statusVenda()->associate($status);
                $venda->save();
                $request->session()->forget('venda_id');
                return redirect()
                    ->route('listavendas')
                    ->with(['success', 'Venda finalizada com sucesso!', 'venda_id' => $venda->id]);
            }

        }
        return redirect()->back();*/

    }
}
