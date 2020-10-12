<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Venda;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class VendaControllerPDV extends Controller
{
    public function iniciar() {
        $vendasEmAndamento = Venda::whereHas('statusVenda', function (Builder $query) {
            $query->where('id', '=', 1);
        })->get();
        return view('venda.venda_inicio', ['vendasPendentes' => $vendasEmAndamento]);
    }
}
