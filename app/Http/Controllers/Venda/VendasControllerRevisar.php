<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendasControllerRevisar extends Controller
{
    public function revisar(Request $request) {
        $cooks = $request->cookie('itens');
        if(!$cooks) {
            return redirect('sisvendaspdvitens');
        }
        /*Recuperando dados dos produtos comprados*/
        $dadosBrutos = explode("*", $cooks);
        $dados = [];
        for ($i = 0; $i < count($dadosBrutos) - 1; $i++) {
            $dados[] = explode("-", $dadosBrutos[$i]);
        }

        /*Armazenando dados da compra*/
        $totalProdutos = 0;
        foreach ($dados as $dado) {
            $totalProdutos += $dado[4];
        }
        $subTotal = $totalProdutos;
        $dadosvenda = ['idcliente'=>$request->idcliente, 'nomecliente'=>$request->nomecliente,
                'idusuario'=>$request->idusuario, 'nomeusuario'=>$request->nomeusuario,
                'dtvenda'=>date("Y-m-d"), 'hrvenda'=>date("H:i:s"), 'totalprodutos'=>$totalProdutos,
                'totalliq'=>$subTotal, 'metodopg'=>$request->metodopg, 'status'=>'em andamento'];

        return view("sisvendaspdv_revisao", ['itens' => $dados, 'dadosvenda'=>$dadosvenda]);

    }
}
