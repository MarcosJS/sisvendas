<?php

namespace App\Auxiliar;

use App\Models\Caixa\CatMovCaixa;
use App\Models\Caixa\TipoMovCaixa;
use App\Models\Pagamento\Pagamento;

class ImpressaoAuxiliar
{
    public static function imprimirItemPorPagina($itens, $quantidade, $view) {
        $intervalo = $quantidade;

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

        $tipo = TipoMovCaixa::all();
        $cat = CatMovCaixa::all();
        $pagamento = Pagamento::all();

        foreach ($grupos as $grupo) {
            $paginasHtml[] = view($view, ['linhas' => $grupo, 'tipo' => $tipo, 'cat' => $cat, 'pagamento' => $pagamento]);
        }

        return $paginasHtml;
    }
}
