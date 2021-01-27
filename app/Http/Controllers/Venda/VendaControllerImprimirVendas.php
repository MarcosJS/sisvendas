<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Models\Venda;
use App\Models\CustomPDF;
use PDF;

class VendaControllerImprimirVendas extends Controller
{
    public function imprimir () {
        //try {
            $vendas = Venda::all()->sortBy('id');

            $intervalo = 47;

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

        //$html = view('venda.impressao.lista_vendas', ['vendas' => $vendas, 'grupos' => $grupos]);

        $paginasHtml = [];

        foreach ($grupos as $grupo) {
            $paginasHtml[] = view('venda.impressao.lista_vendas', ['grupo' => $grupo]);
        }

        $headerHTML = '<table class="table table-sm table-borderless">
        <tr>
            <td>FORTE GRÃOS</td>
            <td style="text-align: right;">10.456987/0001-89</td>
        </tr>
        <tr>
            <td colspan="2">AV. ALCIDES CORDEIRO CAMPOS, CENTRO, CUPIRA - PE 55.55670-000</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">RELAÇÃO DE VENDAS</td>
        </tr>
    </table>';


        PDF::setHeaderCallback(function($pdf) use ($headerHTML) {
            $pdf->SetFont('courier', 'b', 12);
            $pdf->setY(3);
           $pdf->writeHTML($headerHTML, true, false, true, false, '');

        });

        PDF::setFooterCallback(function($pdf) {
            $pdf->SetFont('courier', 'b', 12);
            $pdf->setY(-10);
            $pdf->SetRightMargin(-18);
            $footerHTML = '<table>
        <tr>
            <td style="text-align: right;">Página '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages().'</td>
        </tr>
    </table>';
            $pdf->writeHTML($footerHTML, true, false, true, false, '');

        });

        //PDF::SetTitle('Hello World');
        PDF::SetFont('courier', '', 12, false);
        PDF::SetMargins(7, 12, 7);
        PDF::SetAutoPageBreak(FALSE, 10);
        foreach ($paginasHtml as $html) {
            PDF::AddPage();
            PDF::writeHTML($html, true, false, true, false, '');
        }
        PDF::endPage();
        PDF::Output('test.pdf', 'I');

        /*$tcpdf = new CustomPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $tcpdf->setHeaderData($ln='', $lw=0, $ht='', $hs=$headerHTML);
        $tcpdf->AddPage();
        $tcpdf->writeHTML($html, true, false, true, false, '');
        $tcpdf->lastPage();
        $tcpdf->Output('test.pdf', 'I');*/

        /*CustomPDF::setHeaderData($ln='', $lw=0, $ht='', $hs=$headerHTML);//Funciona mas não altera o pdf
        CustomPDF::AddPage();
        CustomPDF::writeHTML($html, true, false, true, false, '');
        CustomPDF::lastPage();
        CustomPDF::Output('test.pdf', 'I');*/

        /*PDF::setHeaderData($ln='', $lw=0, $ht='', $hs=$headerHTML);//Funciona mas não altera o pdf
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::lastPage();
        PDF::Output('test.pdf', 'I');*/


        /*$pdf = PDF::loadView('venda.impressao.lista_vendas', [
            'vendas' => $vendas,
            'grupos' => $grupos])
            ->setOptions(['defaultFont' => 'arial']);

        return $pdf->stream('Vendas.pdf');*/

        return view('venda.impressao.lista_vendas', [
            'vendas' => $vendas,
            'grupos' => $grupos]);

        /*} catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['erro' => $exception->getMessage()]);
        }*/
    }
}
