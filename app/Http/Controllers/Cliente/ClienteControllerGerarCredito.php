<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente\CatMovCredCliente;
use App\Models\Cliente\MovimentoCreditoCliente;
use App\Models\Cliente\TipoMovCredCliente;
use App\Models\Venda;
use Illuminate\Http\Request;

class ClienteControllerGerarCredito extends Controller
{
    public function gerarCredito(Request $request) {
        $venda = Venda::find($request['venda']);
        $cliente = $venda->cliente;
        $excedente = $request['excedente'];
        $tipo = TipoMovCredCliente::find(1);
        $categoria  = CatMovCredCliente::find(1);

        $credito = new MovimentoCreditoCliente();

        date_default_timezone_set('America/Recife');
        $credito['valor'] = $excedente;
        $credito['dt_movimento'] = date('Y-m-d');
        $credito['hr_movimento'] = date('H:i:s');

        $credito->tipoMovCredCliente()->associate($tipo);
        $credito->catMovCredCliente()->associate($categoria);
        $credito->cliente()->associate($cliente);
        $credito->venda()->associate($venda);

        $credito->save();

        return redirect()->route('registrarvenda');
    }
}
