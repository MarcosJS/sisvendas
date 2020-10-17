<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\VendaItem;
use Illuminate\Http\Request;

class VendaControllerItensExcluir extends Controller
{
    public function excluirItem($id) {
        $item = VendaItem::find($id);

        if($item != null) {
            $produto = $item->produto;
            $produto->estoque += $item->qtd;
            $produto->save();

            $venda = $item->venda;
            $item->delete();
            $venda->atualizarValores();

            return redirect()->back();

        }
        return redirect()
            ->back()
            ->withErrors('item', 'O item não esta presente do banco de dados');
    }
}
