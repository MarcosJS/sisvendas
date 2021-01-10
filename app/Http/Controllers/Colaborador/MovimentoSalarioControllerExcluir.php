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
            $movimento->delete();
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
