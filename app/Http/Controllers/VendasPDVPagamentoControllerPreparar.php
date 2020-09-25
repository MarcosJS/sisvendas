<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;

class VendasPDVPagamentoControllerPreparar extends Controller
{
    public function preparar(Request $request) {
        $clientes = Cliente::all();
        $usuarios = Usuario::all();
        $cooks = $request->cookie('itens');
        if($cooks) {
            $dadosBrutos = explode("*", $cooks);
            $dados = [];
            for ($i = 0; $i < count($dadosBrutos) - 1; $i++) {
                $dados[] = explode("-", $dadosBrutos[$i]);
            }
            return view("sisvendaspdv_pagamento", ['clientes'=>$clientes, 'usuarios'=>$usuarios, 'itens' => $dados]);
        }
        return redirect('sisvendaspdvitens');
    }
}
