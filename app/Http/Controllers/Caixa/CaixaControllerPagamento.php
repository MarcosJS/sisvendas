<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\Caixa\Turno;
use App\Models\Cliente;
use App\Models\Produto\Produto;
use App\Models\Venda;
use App\Validator\PagamentoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class CaixaControllerPagamento extends Controller
{public function pagamento(Request $request) {
    try {
        PagamentoValidator::validate($request->session()->all());
        $caixa = Caixa::first();
        if ($caixa == null) {
            $caixa = new Caixa();
            $caixa->save();
        }
        $turno = Turno::find($caixa->turnoAtual);

        $produtos = Produto::all()->sortBy('nome');
        $venda = Venda::find(Session()->get('venda_id'));
        if (!$venda) {
            $venda = new Venda();
            $venda->totalprodutos = 0;
            $venda->totalliq = 0;
        }

        return view('caixa.pagamento', [
            'caixa' => $caixa,
            'turno' => $turno,
            'venda' => $venda,
            'pagamentos' => $venda->pagamentos
        ]);

    } catch (ValidationException $exception) {
        return redirect()
            ->back()
            ->withErrors($exception->getValidator());;
    }
}
}
