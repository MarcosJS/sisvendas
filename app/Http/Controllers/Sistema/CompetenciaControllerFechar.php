<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompetenciaControllerFechar extends Controller
{
    public function fechar () {
        try {
            $sistema = Session()->get('sistema');
            $sistema->novaCompetencia();
            return redirect()->back();

        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
