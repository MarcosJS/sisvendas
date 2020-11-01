<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Produto\Produto;
use App\Validator\ProducaoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class ProdutoControllerProducaoRegistrar extends Controller
{
    public function registrar(Request $request, $id) {

        try{
            ProducaoValidator::validate($request->all());
            $producao = new Producao();
            $producao->fill($request->all());
            $produto = Produto::find($id);

            if($producao != null && $produto != null)
            {
                $estoque = $produto->estoque;
                $produto->estoque += $producao->quantidade;

                if($produto->estoque == $estoque + $producao->quantidade) {
                    $produto->producao()->saveMany([$producao]);
                    $produto->save();
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
