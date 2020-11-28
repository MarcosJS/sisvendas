<?php

namespace App\Http\Controllers\Pagamento;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\Pagamento\Cheque;
use App\Models\Pagamento\Emitente;
use App\Models\Pagamento\Pagamento;
use App\Models\Venda;
use App\Validator\ChequeValidator;
use App\Validator\EmitenteValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class PagamentoControllerRegistrarCheque extends Controller
{
    public function registrar(Request $request) {
        try {
            ChequeValidator::validate($request->all());
            EmitenteValidator::validate($request->all());

            $venda = Venda::find($request->session()->get('venda_id'));

            $pagamento = new Pagamento();
            $pagamento->tipo = 'CHEQUE';
            $pagamento->valor = $request->valor;
            date_default_timezone_set('America/Recife');
            $pagamento->dtpagamento = date("Y-m-d");
            $pagamento->venda()->associate($venda);

            $caixa = Caixa::first();
            $pagamento->concluir($caixa);

            $cheque = new Cheque();
            $cheque->fill($request->all());
            $cheque->pagamento()->associate($pagamento);
            $cheque->save();

            $emitente = new Emitente();
            $emitente->fill($request->all());
            $cheque->emitente()->save($emitente);

            return redirect()->back();

        } catch (ValidationException $exception) {
            $exception->getValidator()->errors()->add('pagamento', 'Erro na validação do pagamento');
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }

    }
}
