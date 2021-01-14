<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Models\Colaborador\MovimentoSalario;
use Illuminate\Http\Request;

class MovimentoSalarioControllerExcluir extends Controller
{
    public function excluir($id) {
        try {
            $movimento = MovimentoSalario::find($id);
            $competenciaAtual = Session()->get('sistema')->competencia();
            if ($movimento->competencia->id == $competenciaAtual->id) {
                $movimento->delete();
                return redirect()->back();
            } else {
                throw new \Exception('Só é possivel excluir movimentos da competência atual');
            }

        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
