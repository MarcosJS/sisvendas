<div class="row bg-dark mt-3 border border-secondary rounded">
    <div class="col-sm-4">
        <table>
            <tr class="text-success">
                <td>Entradas: </td> <td><b>R$ {{number_format($saldoEntradas,2, '.', '')}}</b></td>
            </tr>
            <tr class="text-danger">
                <td>Saídas: </td> <td><b>R$ {{number_format($saldoSaidas,2, '.', '')}}</b></td>
            </tr>
            <tr class="text-white">
                <td>Saldo do Parcial: </td> <td><b>R$ {{number_format($saldoEntradas + $saldoSaidas,2, '.', '')}}</b></td>
            </tr>
        </table>
    </div>
    <div class="col-sm-4">
        <table>
            <tr class="text-white">
                <td>SALDO DO CAIXA: </td> <td><b>R$ {{number_format($saldoCaixa,2, '.', '')}}</b></td>
            </tr>
            <tr class="text-white">
                <td>SALDO ANTERIOR: </td> <td><b>R$ {{number_format($saldoAnterior,2, '.', '')}}</b></td>
            </tr>
            <tr class="text-white">
                <td>N° MOVIMENTAÇÕES: </td> <td><b>{{$quantEntradas + $quantSaidas}}</b></td>
            </tr>
        </table>
    </div>
    <div class="col-sm-4 align-self-center">
        <table class="float-right text-info" style="table-layout: fixed">
            <tr>
                <td>Dinheiro: </td> <td><b>R$ {{number_format($dinheiro['entrada'],2, '.', '')}}</b></td>
            </tr>
            <tr>
                <td>Cheque: </td> <td><b>R$ {{number_format($cheque['entrada'],2, '.', '')}}</b></td>
            </tr>
            <tr>
                <td>Transferência: </td> <td><b>R$ {{number_format($transferencia['entrada'],2, '.', '')}}</b></td>
            </tr>
        </table>
    </div>
</div>

