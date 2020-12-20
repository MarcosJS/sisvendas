<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Validator\MovimentoCaixaValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaixaControllerRealizarSangria extends Controller
{
    public function realizarSangria(Request $request) {
        try {
            MovimentoCaixaValidator::validate($request->all());
            $caixa = Caixa::first();
            if ($caixa != null && $caixa->aberto()) {
                date_default_timezone_set('America/Recife');
                $data = date("Y-m-d");
                $hora = date("H:i:s");
                $caixa->addMovimento('SAIDA', 'SANGRIA', -$request['sangria'], $data, $hora, $request['observacao'], Auth::id());
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
