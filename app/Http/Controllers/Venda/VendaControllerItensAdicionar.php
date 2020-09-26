<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\VendaItem;
use App\Validator\InclusaoItemValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

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
            } else {
                $venda = new Venda();
                $venda->usuario()->associate($request->session()->get('usuario')->id);
                $venda->dtvenda = date("Y-m-d");
                $venda->hrvenda = date("H:i:s");
                $venda->totalprodutos = 0;
                $venda->desconto = 1;
                $venda->status = 'em andamento';
                $venda->atualizarValores();
                $venda->save();
            }

            $request->session()->put('LastTokenFormItem', $request->_token);

            return redirect('venda_itens');

        } catch (ValidationException $exception) {
            return redirect('venda_itens')
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
