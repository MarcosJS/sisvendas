<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Models\Colaborador\CatMovSalario;
use App\Models\Colaborador\Colaborador;
use App\Models\Colaborador\MovimentoSalario;
use App\Models\Colaborador\TipoMovSalario;
use App\Models\Competencia;
use Illuminate\Http\Request;
use PDF;

class MovimentoSalarioControllerFiltrar extends Controller
{
    public function filtrar (Request $request) {

        try {

            $colaborador = Colaborador::find($request['colaborador']);
            $pesquisa['colaborador'] = $request['colaborador'];
            $pesquisa['competencia'] = $request['competencia'];
            $pesquisa['tipo'] = $request['tipo'];
            $pesquisa['categoria'] = $request['categoria'];

            if (Session()->has('pesquisaMovimentosSalario')) {
                Session()->forget('pesquisaMovimentosSalario');
            }
            Session()->put('pesquisaMovimentosSalario', $pesquisa);

            $movimentos = $this->consulta($request->all());

            $competencias = Competencia::all();
            $tipos = TipoMovSalario::all();
            $categorias = CatMovSalario::all();

            $total = 0;

            foreach ($movimentos as $mov) {
                $total += $mov['valor'];
            }

            return view('colaboradores.colaborador_movimentos', [
                'colaborador' => $colaborador,
                'pesquisa' => $pesquisa,
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

    public static function consulta ($dados) {
        $movimentos = MovimentoSalario::all();

        if ($dados['colaborador'] != null) {
            $movimentos = $movimentos->where('colaborador_id', '=', $dados['colaborador']);
        }

        if ($dados['competencia'] != null) {
            $movimentos = $movimentos->where('competencia_id', '=', $dados['competencia']);
        }

        if ($dados['tipo'] != null) {
            $movimentos = $movimentos->where('tipo_mov_salario_id', '=', $dados['tipo']);
        }

        if ($dados['categoria'] != null) {
            $movimentos = $movimentos->where('cat_mov_salario_id', '=', $dados['categoria']);
        }


        return $movimentos;
    }
}
