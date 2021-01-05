<?php

namespace App\Http\Controllers\Produto\Composicao;

use App\Exceptions\CustomValidationException;
use App\Http\Controllers\Controller;
use App\Models\Produto\Composicao;
use App\Models\Produto\ItemComposicao;
use App\Models\Produto\Produto;
use App\Validator\SalvarComposicaoValidator;


class ComposicaoControllerSalvar extends Controller
{
    public function salvar ($id) {
        try {
            $dados['produto'] = $id;
            SalvarComposicaoValidator::validate($dados);

            $produto = Produto::find($id);
            $itens = Session()->get('itens');
            $composicao = new Composicao();
            $composicao->produto()->associate($itens[0]['produto']);
            $composicao->save();

            foreach ($itens as $item) {
                $itemComposicao = new ItemComposicao();
                $itemComposicao['quantidade'] = $item['quantidade'];
                $itemComposicao->materiaPrima()->associate($item['material']);
                $itemComposicao->composicao()->associate($composicao);
                $itemComposicao->save();
            }

            $produto['composicao_atual'] = $composicao['id'];
            $produto->save();
            Session()->forget('itens');

            return redirect()->route('dadosdoproduto', $produto->id);

        } catch (CustomValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getErrors())
                ->withInput();
        }
    }
}
