<?php

namespace App\Http\Controllers\Colaborador;

use App\Exceptions\ObjetoNaoEncontradoException;
use App\Http\Controllers\Controller;
use App\Models\Colaborador\Colaborador;
use App\Models\Competencia;
use App\Validator\MovimentoSalarioValidator;
use App\Validator\ValidationException;
use Exception;
use Illuminate\Http\Request;

class MovimentoSalarioControllerLancar extends Controller
{
    public function lancar(Request $request, $id) {

        try{
            MovimentoSalarioValidator::validate($request->all());
            $colaborador = Colaborador::find($id);

            if($colaborador != null)
            {
                date_default_timezone_set('America/Recife');
                $data = date("Y-m-d");
                if ($request['dtmovimento'] != null) {
                    $data = $request['dtmovimento'];
                }

                $competencia = Competencia::all()->sortByDesc('numero')->first();

                $addMov = $colaborador->addMovimentoSalario($request['categoria'], $request['valor'], $data, $competencia, $request['observacao']);

                return redirect()->back();
            } else {
                throw new ObjetoNaoEncontradoException('Objeto ['.gettype($colaborador).']=>'.$id.' não encontrado no banco de dados.');
            }

        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();

        } catch (Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()])
                ->withInput();
        }
    }
}
