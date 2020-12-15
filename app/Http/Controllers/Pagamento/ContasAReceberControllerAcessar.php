<?php

namespace App\Http\Controllers\Pagamento;

use App\Http\Controllers\Controller;
use App\Models\Pagamento\Vale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContasAReceberControllerAcessar extends Controller
{
    public function acessar () {
        $vales = Vale::where('dtquitacao', '=', null)->get();
        $totalVales = 0;
        $quantidadeVales = 0;

        foreach ($vales as $v) {
            $totalVales += $v->valor;
            $quantidadeVales++;
        }

        return view('caixa.contasareceber.contas_a_receber', [
            'vales' => $vales,
            'totalVales' => $totalVales,
            'quantidadeVales' => $quantidadeVales
        ]);
    }
}
