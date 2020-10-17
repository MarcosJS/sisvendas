<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Venda;
use App\Validator\PagamentoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class VendaControllerPagamento extends Controller
{
    public function pagamento(Request $request) {
        try {
            PagamentoValidator::validate($request->session()->all());
            $clientes = Cliente::all();
            $venda = Venda::find($request->session()->get('venda_id'));
            $metodospg = [
                ['id' => 1, 'nomemetodopagamento' => 'CHEQUE']];

            return view("venda.venda_pagamento", [
                'clientes' => $clientes,
                'venda' => $venda,
                'metodospg' => $metodospg,
                'pagamentos' => $venda->pagamentos,
                'cliente' => $venda->cliente]);

        } catch (ValidationException $exception) {
            return redirect()
                ->route('itens')
                ->withErrors($exception->getValidator());;
        }
    }
}
