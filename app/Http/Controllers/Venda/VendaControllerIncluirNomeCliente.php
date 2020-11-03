<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Venda;
use App\Validator\InclusaoNomeClienteValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class VendaControllerIncluirNomeCliente extends Controller
{
    public function incluirNome(Request $request) {
        try {

            InclusaoNomeClienteValidator::validate($request->all());
            if(session()->has('venda_id')) {
                $venda = Venda::find(session()->get('venda_id'));
                if($venda->cliente == null) {
                    $venda->nomecliente = $request['nomecliente'];
                    $venda->save();
                } else {
                    return redirect()
                        ->back()
                        ->withErrors(['nomecliente' => 'Desvincule o cliente atual primeiro']);
                }
            }
            return redirect()->back();
        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
