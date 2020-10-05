<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Telefone;
use App\Validator\ClienteValidator;
use App\Validator\EnderecoValidator;
use App\Validator\TelefoneValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class ClienteControllerAdicionar extends Controller
{
    public function adicionar(Request $request) {
        try {
            ClienteValidator::validate($request->all());
            $cliente = new Cliente();
            $cliente->fill($request->all());

            EnderecoValidator::validate($request->all());
            $endereco = new Endereco();
            $endereco->fill($request->all());

            TelefoneValidator::validate($request->all());

            $cliente->save();
            $cliente->endereco()->save($endereco);

            if($request->numerotel != '') {
                $telefone = new Telefone();
                $telefone->fill($request->all());
                $cliente->telefone()->saveMany([$telefone]);
            }

            return redirect('clientes');
        } catch (ValidationException $exception) {
            return redirect('clientes/novo')
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
