<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Models\Colaborador\Colaborador;
use PDF;

class MovimentoSalarioControllerImprimir extends Controller
{
    public function imprimir () {
        //try {
            if (Session()->has('pesquisaMovimentosSalario')) {
                $pesquisa = Session()->get('pesquisaMovimentosSalario');
                $colaborador = Colaborador::find($pesquisa['colaborador']);

                $movimentos = MovimentoSalarioControllerFiltrar::consulta($pesquisa);

                $total = 0;

                foreach ($movimentos as $mov) {
                    $total += $mov['valor'];
                }

                return view('colaboradores.impressao.lista_movimentos', ['colaborador' => $colaborador, 'movimentos' => $movimentos, 'total' => $total,]);
                $pdf = PDF::loadView('colaboradores.impressao.lista_movimentos', [
                    'colaborador' => $colaborador,
                    'movimentos' => $movimentos,
                    'total' => $total,
                ])->setOptions(['defaultFont' => 'arial']);

                return $pdf->download('Movimentos_de_Salario.pdf');
            } else {
                throw new \Exception('Não exitem argumentos de pesquisa para realizar a exportação');
            }
        /*} catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }*/
    }
}
