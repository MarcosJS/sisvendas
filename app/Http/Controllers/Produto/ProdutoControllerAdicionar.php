<?php

namespace App\Http\Controllers\Produto;

use App\Models\Produto;
use App\Validator\ProdutoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdutoControllerAdicionar extends Controller
{
    public function adicionar(Request $request) {
        try{
            ProdutoValidator::validate($request->all());
            $produto = new Produto();
            $produto->fill($request->all());
            if($produto) {
                $produto->save();
                return redirect()->route('produtos');
            }
        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
