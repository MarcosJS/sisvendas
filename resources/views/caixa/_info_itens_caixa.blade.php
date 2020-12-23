<div class="row">
    <div id="totaiscaixa" class="col-sm-6 ml-auto rounded bg-dark">

        <div class="row">
            <div class="col-sm-6">
                <table>
                    <tr>
                        <td><b class="text-white-50">Total: </b></td><td class="text-right"><b class="text-white">R$ {{number_format($venda->totalprodutos,2, ',', '')}}</b></td>
                    </tr>
                    <tr>
                        <td><b class="text-white-50">Desconto: </b></td><td class="text-right"><b class="text-white">-R$ {{number_format($venda->descCifra(),2, ',', '')}}</b></td>
                    </tr>
                    <tr>
                        <td><b class="text-white-50">Cred Cliente: </b></td><td class="text-right"><b class="text-white">-R$ {{number_format($venda['creditoaplicado'],2, ',', '')}}</b></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-6">
                <table class="bg-dark float-right" style="table-layout: fixed">
                    <tr>
                        <th class="text-center"><b class="text-white pr-3">ITENS</b></th><th class="text-center"><b class="text-white">TOTAL A PAGAR</b></th>
                    </tr>
                    <tr>
                        <td class="text-center"><b class="text-warning pr-3" style="font-size: 1.2rem">{{count($venda->vendaItens)}}</b></td><td class="text-center"><b class="text-warning" style="font-size: 1.8rem">{{number_format($venda->totalliq,2, ',', '')}}</b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
