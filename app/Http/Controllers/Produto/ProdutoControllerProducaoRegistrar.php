<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Producao;
use App\Validator\ProducaoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class ProdutoControllerProducaoRegistrar extends Controller
{
    public function registrar(Request $request) {
        try{
            ProducaoValidator::validate($request->all());
            $producao = new Producao();
            $producao->fill($request->all());

            if($producao) {
                $producao->save();
                return redirect()->back();
            }
        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
