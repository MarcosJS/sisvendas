<?php

namespace App\Http\Controllers\Caixa;

use App\Auxiliar\ControleDeCaixaAuxiliar;
use App\Http\Controllers\Controller;
use App\Models\Caixa\Turno;

class ControleDeCaixaControllerAcessar extends Controller
{
    public function acessar() {
        try{
            $ultimoTurno = Turno::orderByDesc('id')->first();

            if ($ultimoTurno != null) {
                //$movimentos = $ultimoTurno->movimentos->sortByDesc('id');
                $movimentos = ControleDeCaixaAuxiliar::consulta([
                    'movimento' => null,
                    'turno' => $ultimoTurno->id,
                    'tipo' => null,
                    'categoria' => null,
                    'dt_inicio' => null,
                    'dt_fim' => null,
                    'meio' => null]);
            } else {
                //$movimentos = [];
                $movimentos = ControleDeCaixaAuxiliar::consulta(null);
            }

            $dados = ControleDeCaixaAuxiliar::analisar($movimentos);

            return ControleDeCaixaAuxiliar::exibirControleDeCaixa('caixa.controle_de_caixa', $dados);

        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
