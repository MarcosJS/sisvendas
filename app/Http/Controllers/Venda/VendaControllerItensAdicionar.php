<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\VendaItem;
use App\Validator\InclusaoItemValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendaControllerItensAdicionar extends Controller
{
    public function adicionarItem(Request $request) {

        try {
            InclusaoItemValidator::validate($request->all());
            $item = new VendaItem();
            $item->fill($request->all());
            $item->produto()->associate(Produto::find($request->codproduto));

            $venda = Venda::find($request['venda_id']);

            if($venda) {
                $venda->vendaItens()->saveMany([$item]);
                $venda->atualizarValores();
            } else {
                $venda = new Venda();
                $venda->usuario()->associate(Auth::id());
                date_default_timezone_set('America/Recife');
                $venda->dtvenda = date("Y-m-d");
                $venda->hrvenda = date("H:i:s");
                $venda->save();
                $venda->vendaItens()->saveMany([$item]);
                $venda->atualizarValores();
            }

            $request->session()->put('venda_id', $venda->id);
            return redirect('vendas/itens');

        } catch (ValidationException $exception) {
            return redirect('vendas/itens')
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
