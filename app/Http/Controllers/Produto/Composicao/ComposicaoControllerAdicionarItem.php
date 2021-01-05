<?php

namespace App\Http\Controllers\Produto\Composicao;

use App\Http\Controllers\Controller;
use App\Models\MateriaPrima\MateriaPrima;
use App\Models\Produto\Produto;
use App\Validator\AdicionarItemComposicaoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class ComposicaoControllerAdicionarItem extends Controller
{
    public function adicionar(Request $request) {
        try {
            AdicionarItemComposicaoValidator::validate($request->all());
            //return 'saiu da validacao';
            $produto = Produto::find($request['produto']);
            $material = MateriaPrima::find($request['material']);
            $quantidade = $request['quantidade'];

            $item['produto'] = $produto;
            $item['material'] = $material;
            $item['quantidade'] = $quantidade;

            $itens = null;

            if (!Session()->has('itens')) {
                $itens[] = $item;
            } else {
                $itens = Session()->pull('itens');
                if ($itens[0]['produto']->id != $produto->id) {
                    $itens = null;
                    $itens[] = $item;
                } else {
                    array_push($itens, $item);
                }
            }
            Session()->put('itens', $itens);

            return redirect()->route('novacomposicao', $produto->id);

        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
