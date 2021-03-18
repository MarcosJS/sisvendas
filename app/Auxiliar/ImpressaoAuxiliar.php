<?php

namespace App\Auxiliar;

class ImpressaoAuxiliar
{
    public static function imprimirItemPorPagina($itens, $quantidade, $view) {
        $intervalo = $quantidade;

        //$ciclo  = count($itens) / $intervalo;
        $ciclo = intdiv(count($itens), $intervalo);

        if ($ciclo * $intervalo < count($itens)) {
            $ciclo++;
        }

        $grupos = [];

        for($j = 1; $j <= $ciclo; $j++) {
            $linhas = [];
            for ($i = $intervalo * $j - $intervalo; $i < count($itens); $i++) {
                if ($i != 0 && $i % ($intervalo * $j) == 0) {
                    break;
                }
                $linhas[] = $itens[$i];
            }
            $grupos[] = $linhas;
        }

        $paginasHtml = [];

        foreach ($grupos as $grupo) {
            $paginasHtml[] = view($view, ['grupo' => $grupo]);
        }

        return $paginasHtml;
    }
}
