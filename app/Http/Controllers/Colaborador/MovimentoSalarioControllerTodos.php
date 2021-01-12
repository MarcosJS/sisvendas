<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Models\Colaborador\CatMovSalario;
use App\Models\Colaborador\MovimentoSalario;
use App\Models\Colaborador\TipoMovSalario;
use App\Models\Competencia;

class MovimentoSalarioControllerTodos extends Controller
{
    public function obterTodos () {
        try {
            return view('colaboradores.colaborador_movimentos', [
                'colaborador' => null,
                'movimentos' => MovimentoSalario::all(),
                'total' => MovimentoSalario::all()->sum('valor'),
                'competencias' => Competencia::all(),
                'tipos' => TipoMovSalario::all(),
                'categorias' => CatMovSalario::all()
            ]);
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
