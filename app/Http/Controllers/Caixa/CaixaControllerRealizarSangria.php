<?php

namespace App\Http\Controllers\Caixa;

use App\Http\Controllers\Controller;
use App\Models\Caixa\Caixa;
use App\Models\Caixa\CatMovCaixa;
use App\Models\Caixa\MovimentoCaixa;
use App\Models\Caixa\TipoMovCaixa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaixaControllerRealizarSangria extends Controller
{
    public function realizarSangria(Request $request) {
        $caixa = Caixa::first();
        if ($caixa != null && $caixa->aberto()) {
            date_default_timezone_set('America/Recife');
            $data = date("Y-m-d");
            $hora = date("H:i:s");
            $caixa->addMovimento('SAIDA', 'SANGRIA', -$request['sangria'], $data, $hora, Auth::id());
        }
        return redirect()->back();
    }
}
