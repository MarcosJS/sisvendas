<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\MateriaPrima\MateriaPrima;
use App\Validator\MateriaPrimaValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class MateriaPrimaControllerAtualizar extends Controller
{
    public function atualizar(Request $request)
    {
        try{
            MateriaPrimaValidator::validate($request->all());
            $material = MateriaPrima::find($request['id']);
            if ($material) {
                $material->nome = $request['nome'];
                $material->descricao = $request['descricao'];
                $material->update();
                return redirect()->route('dadosdomaterial', $material['id']);
            }
        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }

    }
}
