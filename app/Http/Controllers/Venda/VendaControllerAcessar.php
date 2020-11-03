<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Venda;

class VendaControllerAcessar extends Controller
{
    public function acessar($id) {
        $venda = Venda::find($id);
        $cliente = $venda->cliente;
        $pagamentos = $venda->pagamentos;
        $usuario = $venda->usuario;
        $itens = $venda->vendaItens;
        return view('venda.venda', [
            'venda' => $venda,
            'cliente' => $cliente,
            'nomecliente' =>$venda->nomecliente,
            'pagamentos' => $pagamentos,
            'usuario' => $usuario,
            'itens' => $itens]);
    }
}
