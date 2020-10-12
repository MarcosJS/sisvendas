<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Venda;
use App\Validator\RevisaoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendasControllerValidar extends Controller
{
    public function validar(Request $request) {

        if($request->session()->has('venda_id')) {
            try {
                $venda = Venda::find($request->session()->get('venda_id'));

                RevisaoValidator::validate(['venda_id' =>$venda->id, 'pagamento' => $venda->pagamentos]);

                date_default_timezone_set('America/Recife');
                $venda->dtvenda = date("Y-m-d");
                $venda->hrvenda = date("H:i:s");
                $venda->valida = true;
                $venda->save();

                return view("venda.venda_revisao", [
                    'venda' => $venda,
                    'itens' => $venda->vendaItens,
                    'cliente'=>$venda->cliente,
                    'usuario' => Auth::user(),
                    'pagamentos' => $venda->pagamentos,
                    'clientes' => Cliente::all()]);


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


    }
}
