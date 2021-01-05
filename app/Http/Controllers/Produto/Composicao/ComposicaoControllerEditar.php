<?php

namespace App\Http\Controllers\Produto\Composicao;

use App\Http\Controllers\Controller;
use App\Models\MateriaPrima\MateriaPrima;
use App\Models\Produto\Produto;
use Illuminate\Http\Request;

class ComposicaoControllerEditar extends Controller
{
    public function editar($id) {
        $produto = Produto::find($id);

        if (Session()->has('itens')) {
            Session()->forget('itens');
        }

        if ($produto->composicao() != null) {
            $itensComposicao = $produto->composicao()->itensComposicao;

            foreach ($itensComposicao as $itemC) {
                $item['produto'] = $produto;
                $item['material'] = $itemC->materiaPrima;
                $item['quantidade'] = $itemC['quantidade'];
                $itens[] = $item;
            }
            Session()->put('itens', $itens) ;
        }

        return redirect()->route('novacomposicao', $produto->id);
    }
}
