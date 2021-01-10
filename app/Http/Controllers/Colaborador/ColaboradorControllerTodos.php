<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Models\Colaborador\Colaborador;
use Illuminate\Http\Request;

class ColaboradorControllerTodos extends Controller
{
    public function obterTodos() {
        try {
            $colaboradores = Colaborador::all()->sortBy('nome');
            return view('colaboradores.colaboradores', ['colaboradores' => $colaboradores]);
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
