<?php

namespace App\Http\Controllers\Caixa;

use App\Auxiliar\ControleDeCaixaAuxiliar;
use App\Auxiliar\ImpressaoAuxiliar;
use App\Http\Controllers\Controller;
use PDF;

class ControleDeCaixaControllerImprimir extends Controller
{
    public function imprimir () {
        //try {
        $movimentos = ControleDeCaixaAuxiliar::consulta(Session()->get('pesquisaDeImpressao'));

        $paginasHtml = ImpressaoAuxiliar::imprimirItemPorPagina(array_values($movimentos), 10, 'caixa.impressao.controle_de_caixa');

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
            PDF::AddPage('L');
            PDF::SetMargins(3, 14, 7);
            PDF::writeHTML($html, true, false, true, false, '');
        }
        PDF::endPage();
        PDF::Output('test.pdf', 'I');
    }
}
