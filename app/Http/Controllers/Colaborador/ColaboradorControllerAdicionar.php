<?php

namespace App\Http\Controllers\Colaborador;

use App\Exceptions\FalhaNaCriacaoDoObjetoException;
use App\Http\Controllers\Controller;
use App\Models\Colaborador\Colaborador;
use App\Models\Endereco;
use App\Models\Funcao;
use App\Models\Telefone;
use App\Validator\AdicionarColaboradorValidator;
use App\Validator\EnderecoValidator;
use App\Validator\TelefoneValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColaboradorControllerAdicionar extends Controller
{
    public function adicionar(Request $request) {
        try{
            AdicionarColaboradorValidator::validate($request->all());
            EnderecoValidator::validate($request->all());
            TelefoneValidator::validate($request->all());
            $endereco = new Endereco();
            $endereco->fill($request->all());

            $telefone = new Telefone();
            $telefone->fill($request->all());

            $colaborador = new Colaborador();
            $colaborador->fill($request->all());
            $funcao = Funcao::find($request['funcao']);
            $colaborador->funcao()->associate($funcao);
            if($colaborador) {
                DB::transaction(function () use ($colaborador, $endereco, $telefone){
                    $colaborador->save();
                    $endereco->colaborador()->associate($colaborador);
                    $telefone->colaborador()->associate($colaborador);
                    $endereco->save();
                    $telefone->save();
                });

                return redirect()->route('colaboradores');
            } else {
                throw new FalhaNaCriacaoDoObjetoException('O falha na criação do colaborador, reveja os dados informados.');
            }
        } catch (ValidationException $exception) {
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
