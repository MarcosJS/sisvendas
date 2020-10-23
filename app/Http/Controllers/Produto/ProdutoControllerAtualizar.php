<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Validator\ProdutoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class ProdutoControllerAtualizar extends Controller
{
    public function atualizar(Request $request)
    {
        try{
            ProdutoValidator::validate($request->all());
            $produto = Produto::find($request->id);
            if ($produto) {
                $produto->nome = $request->nome;
                $produto->descricao = $request->descricao;
                $produto->estoque = $request->estoque;
                $produto->preco = $request->preco;
                $produto->update();
                return redirect()->route('dadosdoproduto', $produto->id);
            }
        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }

    }
}
