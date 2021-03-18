<?php

namespace App\Http\Controllers\Venda;

use App\Auxiliar\ImpressaoAuxiliar;
use App\Http\Controllers\Controller;
use App\Models\Venda;
use App\Models\CustomPDF;
use PDF;

class VendaControllerImprimirVendas extends Controller
{
    public function imprimir () {
        //try {
            $vendas = Venda::all()->sortBy('id');

        $paginasHtml = ImpressaoAuxiliar::imprimirItemPorPagina($vendas, 10, 'venda.impressao.lista_vendas');

        //return $paginasHtml[0];

        $headerHTML = '<table style="border: 1px solid black; border-collapse: collapse; padding: 2px">
        <tr>
            <td>FORTE GRÃOS</td>
            <td style="text-align: right;">10.456987/0001-89</td>
        </tr>
        <tr>
            <td colspan="2">AV. Alcides Cordeiro, Centro, Cupira - PE 55.55670-000</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; border: 1px solid black; border-collapse: collapse;">
            Relatório de vendas
            </td>
        </tr>
    </table>';


        PDF::setHeaderCallback(function($pdf) use ($headerHTML) {
            $pdf->SetFont('courier', 'b', 10);
            $pdf->setY(3);
           $pdf->writeHTML($headerHTML, true, false, true, false, '');

        });

        PDF::setFooterCallback(function($pdf) {
            $pdf->SetFont('courier', 'b', 10);
            $pdf->setY(-10);
            $pdf->SetRightMargin(-18);
            $footerHTML = '<table>
        <tr>
            <td style="text-align: right;">Página '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages().'</td>
        </tr>
    </table>';
            $pdf->writeHTML($footerHTML, true, false, true, false, '');

        });

        PDF::SetFont('courier', '', 10, false);
        PDF::SetMargins(7, 14, 7);
        PDF::SetAutoPageBreak(FALSE, 10);
        foreach ($paginasHtml as $html) {
            PDF::AddPage();
            PDF::SetMargins(3, 14, 7);
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
