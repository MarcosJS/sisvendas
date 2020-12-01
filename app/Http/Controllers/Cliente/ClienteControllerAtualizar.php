<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Validator\AdicionarClienteValidator;
use App\Validator\AtualizarClienteValidator;
use App\Validator\ValidationException;
use Exception;
use Illuminate\Http\Request;

class ClienteControllerAtualizar extends Controller
{
    public function atualizar(Request $request) {
        $erro = [];
        try {
            $dados = $request->except(['cpf']);
            AtualizarClienteValidator::validate($dados);
            $cliente = Cliente::find($request['id']);
            if ($cliente) {
                $cliente->nome = $request['nome'];
                $cliente->datanasc = $request['datanasc'];
                $cliente->modcredito = $request['modcredito'];
                $cliente->status = $request['status'];
                $cliente->update();
                return redirect()->route('cliente', $cliente->id);
            } else {
                $erro = ['cliente_id' => 'Cliente não encontrado'];
            }
        } catch (ValidationException $exception) {
            $erro = $exception->getValidator();
        } catch (Exception $exception) {
            $erro = ['falha' => 'Falha contate o administrador do sistema'];
        }

        return redirect()
            ->back()
            ->withErrors($erro)
            ->withInput();
    }
}
