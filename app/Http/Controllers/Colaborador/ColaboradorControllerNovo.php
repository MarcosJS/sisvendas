<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Models\Funcao;
use Illuminate\Http\Request;

class ColaboradorControllerNovo extends Controller
{
    public function novo() {
        try {
            $funcoes = Funcao::all()->sortBy('nomefuncao');
            return view("colaboradores.colaborador_novo", ['funcoes' => $funcoes]);
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
