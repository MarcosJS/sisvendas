<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\MateriaPrima\MateriaPrima;
use App\Validator\MateriaPrimaValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriaPrimaControllerAdicionar extends Controller
{
    public function adicionar(Request $request) {
        try{
            MateriaPrimaValidator::validate($request->all());
            $material = new MateriaPrima();
            $material->fill($request->except('estoque'));

            if($material) {
                $material->save();

                if($request['estoque'] > 0) {
                    date_default_timezone_set('America/Recife');
                    $data = date("Y-m-d");
                    $material->addMovEstoque(1, 1, $request['estoque'], $data, Auth::id());
                }

                return redirect()->route('materiais');
            }
        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
