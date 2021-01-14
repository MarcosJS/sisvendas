<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Validator\MovimentoCaixaValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaixaControllerAdicionarSuprimento extends Controller
{
    public function adicionarSuprimento(Request $request) {
        try {
            MovimentoCaixaValidator::validate($request->all());
            $caixa = Session()->get('sistema')->caixa();
            if ($caixa != null && $caixa->aberto()) {
                date_default_timezone_set('America/Recife');
                $data = date("Y-m-d");
                $hora = date("H:i:s");
                $caixa->addMovimento(1, $request['suprimento'], $data, $hora, $request['observacao'], Auth::id());
                return redirect()->back();
            } else {
                throw new \Exception('O Caixa precisa estar aberto para realizar esta operação');
            }

        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' =>$exception->getMessage()])
                ->withInput();
        }
    }
}
