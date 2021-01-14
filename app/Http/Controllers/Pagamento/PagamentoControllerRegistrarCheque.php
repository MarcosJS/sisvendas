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
            if (Session()->has('venda_id') || $request['vale'] != null) {
                ChequeValidator::validate($request->all());
                EmitenteValidator::validate($request->all());

                $pagamento = new Pagamento();
                $pagamento['valor'] = $request['valor'];
                date_default_timezone_set('America/Recife');
                $pagamento->dtpagamento = date("Y-m-d");

                if (Session()->has('venda_id')) {
                    $venda = Venda::find($request->session()->get('venda_id'));
                    $pagamento->venda()->associate($venda);
                } else {
                    $pagamento->vale()->associate($request['vale']);
                }

                $pagamento->tipoPagamento()->associate(2);
                $pagamento->save();

                $cheque = new Cheque();
                $cheque->fill($request->all());
                $cheque->pagamento()->associate($pagamento);
                $cheque->save();

                $emitente = new Emitente();
                $emitente->fill($request->all());
                $cheque->emitente()->save($emitente);

                return redirect()->back();
            } else {
                throw new \Exception('Nenhuma venda ou vale foi informado!');
            }
        } catch (ValidationException $exception) {
            $exception->getValidator()->errors()->add('pagamento', 'Erro na validação do pagamento');
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()])
                ->withInput();
        }

    }
}
