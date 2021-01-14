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
            TransferenciaValidator::validate($request->all());

            $venda = Venda::find($request->session()->get('venda_id'));

            $pagamento = new Pagamento();
            //$pagamento->tipo = 'CHEQUE';
            $pagamento['valor'] = $request['valor'];
            date_default_timezone_set('America/Recife');
            $pagamento['dtpagamento'] = date("Y-m-d");
            $pagamento->tipoPagamento()->associate(3);
            $pagamento->venda()->associate($venda);
            $pagamento->save();

            $transferencia = new Transferencia();
            $transferencia->fill($request->all());
            $transferencia->pagamento()->associate($pagamento);
            $transferencia->save();

            return redirect()->back();

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
