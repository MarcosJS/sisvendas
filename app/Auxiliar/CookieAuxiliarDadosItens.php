<?php

namespace App\Auxiliar;

class CookieAuxiliarDadosItens
{
    public static function converteParaArray($cooks): array {
        $dadosBrutos = explode("*", $cooks);
        $dadosItens = [];
        for($i = 0; $i < count($dadosBrutos)-1; $i++) {
            $dados = explode("-", $dadosBrutos[$i]);
            $dadosItens[] = ['codproduto'=>$dados[0], 'nomeproduto'=>$dados[1], 'qtd'=>$dados[2], 'precofinal'=>$dados[3], 'subtotal'=>$dados[4]];
        }
        return $dadosItens;
    }
}
