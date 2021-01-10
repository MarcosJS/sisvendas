<?php

namespace App\Http\Controllers\Material;

use App\Exceptions\ObjetoNaoEncontradoException;
use App\Http\Controllers\Controller;
use App\Models\MateriaPrima\MateriaPrima;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriaPrimaControllerRegistrarEntrada extends Controller
{
    public function registrar(Request $request, $id) {

        try{
            $material = MateriaPrima::find($id);

            if($material != null)
            {
                date_default_timezone_set('America/Recife');
                $data = date("Y-m-d");
                if ($request['dtmovimento'] != null) {
                    $data = $request['dtmovimento'];
                }

                $material->addMovEstoqueMat(1, 1, $request['quantidade'], $data, Auth::id(), $request['observacao']);
                return redirect()->back();
            } else {
                throw new ObjetoNaoEncontradoException('Objeto ['.gettype($material).']=>'.$id.' não encontrado no banco de dados.');
            }

        } catch (Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['entrada' => $exception->getMessage()])
                ->withInput();
        }
    }
}
