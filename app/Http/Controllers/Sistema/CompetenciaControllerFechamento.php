<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Colaborador\Colaborador;
use Illuminate\Http\Request;

class CompetenciaControllerFechamento extends Controller
{
    public function fechamento () {
        try {
            $competencia = Session()->get('sistema')['competencia'];
            $colabs = Colaborador::all();
            $colaboradores = [];
            $advertencia = null;
            $quant = 0;

            foreach ($colabs as $colab) {
                $movimento = $colab->movimentoSalarios()
                    ->where('competencia_id', '=', $competencia['id'])
                    ->where('cat_mov_salario_id', '=', 1)->first();
                $colaborador['colaborador'] = $colab;
                $colaborador['movimento'] = $movimento;

                if ($movimento == null) {
                    $quant++;
                }

                $colaboradores[] = $colaborador;
            }
            if ($quant >0) {
                $advertencia = 'Há '.$quant.' colaboradores sem movimento de pagamento!
                Ao fechar a competência você não poderar lançar qualquer movimento na mesma.';
            }

            return view('colaboradores.fechamento_competencia', [
                'colaboradores' => $colaboradores,
                'competencia' => $competencia,
                'advertencia' => $advertencia]);
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
