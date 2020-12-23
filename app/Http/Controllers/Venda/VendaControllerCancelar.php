<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\StatusVenda;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendaControllerCancelar extends Controller
{
    public function cancelar(Request $request) {
        if($request->session()->has('venda_id')) {
            $status = StatusVenda::find(4);
            $venda = Venda::find($request->session()->get('venda_id'));

            if($venda != null) {

                foreach ($venda->vendaItens as $item) {
                    $produto = $item->produto;
                    $produto->addMovEstoque(1, 4, $item->qtd, $venda->dtvenda, Auth::id());
                }

                $caixa = Caixa::first();
                foreach ($venda->pagamentos as $pagamento) {
                    $pagamento->cancelar($caixa);
                }

                foreach ($venda->vales as $vale) {
                    $vale->delete();
                }

                $venda->statusVenda()->associate($status);
                $venda->save();
            }

            $request->session()->forget('venda_id');
        }

        return redirect()->back();
    }
}
