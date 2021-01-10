<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Models\Colaborador\Colaborador;
use App\Models\Funcao;

class ColaboradorControllerEditar extends Controller
{
    public function editar($id) {
        try {
            $colaborador = Colaborador::find($id);
            $funcoes = Funcao::all()->sortBy('nomefuncao');
            if($colaborador) {
                return view('colaboradores.colaborador_editar', [
                    'colaborador' => $colaborador,
                    'funcoes' => $funcoes,
                    'endereco' => $colaborador->endereco,
                    'telefones' => $colaborador->telefones]);
            }
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => 'erro'.$exception->getMessage()]);
        }

    }
}
