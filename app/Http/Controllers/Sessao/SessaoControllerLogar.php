<?php

namespace App\Http\Controllers\Sessao;

use App\Http\Controllers\Controller;
use App\Validator\LoginValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Validator\ValidationException;

class SessaoControllerLogar extends Controller
{
    public function logar(Request $request) {

        try {
            //LoginValidator::validate($request->all());

            $credencias = $request->only('usuario_id');
            Auth::loginUsingId($credencias['usuario_id']);

            /*$credencias = $request->only('cpf', 'password');
            Auth::attempt($credencias);*/

            if(Auth::check()) {
                return redirect('/');
            }

            return redirect('login')
                ->withErrors(['dadosnaoconferem' => 'O cpf ou a senha estão errados.']);

        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
