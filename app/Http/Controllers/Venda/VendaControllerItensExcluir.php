<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\VendaItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendaControllerItensExcluir extends Controller
{
    public function excluirItem($id) {
        $item = VendaItem::find($id);

        if($item != null) {
            $produto = $item->produto;
            $produto->addMovEstoque(1, 3, $item->qtd, $item->venda->dtvenda, Auth::id());

            $venda = $item->venda;
            $item->delete();
            $venda->atualizarValores();

            return redirect()
                ->route('caixa');

        }
        return redirect()
            ->back()
            ->withErrors('item', 'O item não esta presente do banco de dados');
    }
}
