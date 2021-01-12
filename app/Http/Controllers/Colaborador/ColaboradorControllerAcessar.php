<?php

namespace App\Http\Controllers\Colaborador;

use App\Exceptions\ObjetoNaoEncontradoException;
use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\Caixa\Turno;
use App\Models\Colaborador\CatMovSalario;
use App\Models\Colaborador\Colaborador;
use App\Models\Colaborador\MovimentoSalario;
use App\Models\Competencia;


class ColaboradorControllerAcessar extends Controller
{
    public function acessar($id) {
        try {
            $colaborador = Colaborador::find($id);
            $cat = CatMovSalario::all()->sortBy('nome');

            foreach ($cat as $c) {
                $c->nome = str_replace('_', ' ', $c->nome);
            }

            $competencia = Session()->get('sistema')->competencia();

            if ($colaborador != null) {
                $movimentos = $colaborador->movimentoSalarios()->whereHas('competencia', function ($q) use ($competencia){
                    $q->where('numero', '=', $competencia['numero']);
                })->get();

                $saldoSalario = $colaborador->movimentoSalarios()->whereHas('competencia', function ($q) use ($competencia){
                    $q->where('numero', '=', $competencia['numero']);
                })->sum('valor');

                return view('colaboradores.colaborador', [
                    'colaborador' => $colaborador,
                    'catMovSalario' => $cat,
                    'competencia' => $competencia,
                    'movimentos' => $movimentos,
                    'saldoSalario' => $saldoSalario]);
            } else {
                throw new ObjetoNaoEncontradoException();
            }
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
