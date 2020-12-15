<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaixaControllerAdicionarSuprimento extends Controller
{
    public function adicionarSuprimento(Request $request) {
        $caixa = Caixa::first();
        if ($caixa != null && $caixa->aberto()) {
            date_default_timezone_set('America/Recife');
            $data = date("Y-m-d");
            $hora = date("H:i:s");
            $caixa->addMovimento('ENTRADA', 'SUPRIMENTO', $request['suprimento'], $data, $hora, Auth::id());
        }
        return redirect()->back();
    }
}
