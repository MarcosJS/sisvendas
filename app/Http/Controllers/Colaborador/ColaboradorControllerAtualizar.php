<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Models\Colaborador\Colaborador;
use App\Models\Funcao;
use App\Validator\AtualizarColaboradorValidator;
use App\Validator\ValidationException;
use Exception;
use Illuminate\Http\Request;

class ColaboradorControllerAtualizar extends Controller
{
    public function atualizar(Request $request) {
        $erro = [];
        try {
            $dados = $request->except(['cpf']);
            AtualizarColaboradorValidator::validate($dados);
            $colaborador = Colaborador::find($request['id']);
            if ($colaborador) {
                $colaborador['nome'] = $request['nome'];
                $colaborador['dtnascimento'] = $request['dtnascimento'];
                $colaborador['matricula'] = $request['matricula'];
                $funcao = Funcao::find($request['funcao']);
                $colaborador->funcao()->associate($funcao);
                $colaborador['salario'] = $request['salario'];
                $colaborador->update();

                $endereco = $colaborador->endereco;
                $endereco['logradouro'] = $request['logradouro'];
                $endereco['bairro'] = $request['bairro'];
                $endereco['cidade'] = $request['cidade'];
                $endereco->update();

                $telefone = $colaborador->telefones[0];
                $telefone['numerotel'] = $request['numerotel'];
                $telefone->update();

                return redirect()->route('colaborador', $colaborador->id);
            } else {
                $erro = ['colaborador' => 'Colaborador não encontrado'];
            }
        } catch (ValidationException $exception) {
            $erro = $exception->getValidator();
        } catch (Exception $exception) {
            $erro = ['erro' => $exception->getMessage()];
        }

        return redirect()
            ->back()
            ->withErrors($erro)
            ->withInput();
    }
}
