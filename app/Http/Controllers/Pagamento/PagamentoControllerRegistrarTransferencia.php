<?php

namespace App\Http\Controllers\Pagamento;

use App\Http\Controllers\Controller;
use App\Models\Pagamento\Pagamento;
use App\Models\Pagamento\Transferencia;
use App\Models\Venda;
use App\Validator\TransferenciaValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class PagamentoControllerRegistrarTransferencia extends Controller
{
    public function registrar(Request $request) {

        try {
            if (Session()->has('venda_id') || $request['vale'] != null) {
                TransferenciaValidator::validate($request->all());

                $pagamento = new Pagamento();
                $pagamento['valor'] = $request['valor'];
                date_default_timezone_set('America/Recife');
                $pagamento['dtpagamento'] = date("Y-m-d");
                $pagamento->tipoPagamento()->associate(3);

                if (Session()->has('venda_id')) {
                    $venda = Venda::find($request->session()->get('venda_id'));
                    $pagamento->venda()->associate($venda);
                } else {
                    $pagamento->vale()->associate($request['vale']);
                }

                $pagamento->save();

                $transferencia = new Transferencia();
                $transferencia->fill($request->all());
                $transferencia->pagamento()->associate($pagamento);
                $transferencia->save();

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
