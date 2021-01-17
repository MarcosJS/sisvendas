<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Venda;
use PDF;
use Illuminate\Http\Request;

class VendaControllerImprimirVendas extends Controller
{
    public function imprimir () {
        //try {
            $vendas = Venda::all()->sortBy('id');

            $intervalo = 29;

            $ciclo  = count($vendas) / $intervalo;

            if ($ciclo * $intervalo <= count($vendas)) {
                $ciclo++;
            }

            $grupos = [];

            for($j = 1; $j <= $ciclo; $j++) {
                $linhas = [];
                for ($i = $intervalo * $j - $intervalo; $i < count($vendas); $i++) {
                    if ($i != 0 && $i % ($intervalo * $j) == 0) {
                        break;
                    }
                    $linhas[] = $vendas[$i];

                }
                $grupos[] = $linhas;
            }

            //return view('venda.impressao.lista_vendas', ['vendas' => $vendas, 'grupos' => $grupos]);
            $pdf = PDF::loadView('venda.impressao.lista_vendas', [
                'vendas' => $vendas,
                'grupos' => $grupos])
                ->setOptions(['defaultFont' => 'arial']);

            return $pdf->stream('Vendas.pdf');
        //} catch (\Exception $exception) {
            //return redirect()
                //->back()
                //->withErrors(['erro' => $exception->getMessage()]);
       // }
    }
}
