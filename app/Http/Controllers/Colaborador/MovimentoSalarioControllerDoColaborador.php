<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Models\Colaborador\CatMovSalario;
use App\Models\Colaborador\Colaborador;
use App\Models\Colaborador\TipoMovSalario;
use App\Models\Competencia;
use Illuminate\Http\Request;

class MovimentoSalarioControllerDoColaborador extends Controller
{
    public function obterDo($id) {
        try {
            $colaborador = Colaborador::find($id);
            $movimentos = $colaborador->movimentoSalarios;

            $competencias = Competencia::all();
            $tipos = TipoMovSalario::all();
            $categorias = CatMovSalario::all();

            $total = 0;

            foreach ($movimentos as $mov) {
                $total += $mov['valor'];
            }

            return view('colaboradores.colaborador_movimentos', [
                'colaborador' => $colaborador,
                'movimentos' => $movimentos,
                'total' => $total,
                'competencias' => $competencias,
                'tipos' => $tipos,
                'categorias' => $categorias
                ]);
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
