<?php

namespace App\Http\Controllers\Produto;

use App\Models\Produto\Produto;
use App\Validator\ProdutoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProdutoControllerAdicionar extends Controller
{
    public function adicionar(Request $request) {
        try{
            ProdutoValidator::validate($request->all());
            $produto = new Produto();
            $produto->fill($request->except('estoque'));
            if($produto) {
                $produto->save();

                if($request['estoque'] > 0) {
                    date_default_timezone_set('America/Recife');
                    $data = date("Y-m-d");
                    $produto->addMovEstoque(1, 2, $request['estoque'], $data, Auth::id());
                }
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
