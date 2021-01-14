<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\Caixa\Turno;
use App\Models\Venda;
use App\Validator\PagamentoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class CaixaControllerPagamento extends Controller
{public function pagamento(Request $request) {
    try {
        PagamentoValidator::validate($request->session()->all());
        $caixa = Session()->get('sistema')->caixa();
        if ($caixa == null) {
            $caixa = new Caixa();
            $caixa->save();
        }
        $turno = Turno::find($caixa->turnoAtual);

        $venda = Venda::find(Session()->get('venda_id'));
        if (!$venda) {
            $venda = new Venda();
            $venda->totalprodutos = 0;
            $venda->totalliq = 0;
        }

        $excedente = 0;
        if (Session()->has('excedente')) {
            $excedente = Session()->get('excedente');
            Session()->forget('excedente');
        }

        return view('caixa.pagamento', [
            'caixa' => $caixa,
            'turno' => $turno,
            'venda' => $venda,
            'pagamentos' => $venda->pagamentos,
            'vales' => $venda->vales,
            'excedente' => $excedente,
            'vale' => null
        ]);

    } catch (ValidationException $exception) {
        return redirect()
            ->back()
            ->withErrors($exception->getValidator());
    }
}
}
