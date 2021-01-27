@extends('layouts.impressao')

@section('cabecalho')
    <table class="table table-sm table-borderless">
        <tr>
            <th>FORTE GRÃOS</th>
            <th class="text-right">10.456987/0001-89</th>
        </tr>
        <tr>
            <td colspan="2">AV. ALCIDES CORDEIRO CAMPOS, CENTRO, CUPIRA - PE 55.55670-000</td>
        </tr>
        <tr>
            <th colspan="2" class="text-center">RELAÇÃO DE VENDAS</th>
        </tr>
    </table>
@endsection

@section('rodape')
    <span>rodape</span>
@endsection

@section('conteudo')

    <div class="row">

        {{--@for($i = 1; $i <= count($grupos); $i++)
            <table class="table table-striped table-sm">
                <tr>
                    <th class="id_colum">Cod.</th>
                    <th class="text_center">Data</th>
                    <th class="text_right">Total</th>
                    <th class="text_right">Desconto</th>
                    <th class="text_right">Credito do Cliente</th>
                    <th class="text_right">Líquido</th>
                    <th class="text_center">Status</th>
                </tr>
                @foreach($grupos[$i - 1] as $venda)
                    <tr>
                        <td>{{$venda->id}}</td>
                        <td class="text_center">{{date('d/m/Y', strtotime($venda->dtvenda))}}</td>
                        <td class="text_right">{{number_format($venda->totalprodutos,2, ',', '.')}}</td>
                        <td class="text_right">{{number_format($venda->descCifra(),2, ',', '.')}}</td>
                        <td class="text_right">{{number_format($venda['creditoaplicado'],2, ',', '.')}}</td>
                        <td class="text_right"> {{number_format($venda->totalliq,2, ',', '.')}}</td>
                        <td class="text_center"><span>{{$venda->statusVenda->nome}}</span></td>
                    </tr>
                @endforeach
                @if($i < count($grupos))
                    <!--<p style="page-break-after: always; margin: 0;"></p>-->
                @endif
            </table>
        @endfor--}}

        <table class="table table-striped table-sm">
            <tr>
                <th class="id_colum">Cod.</th>
                <th class="text_center">Data</th>
                <th class="text_right">Total</th>
                <th class="text_right">Desconto</th>
                <th class="text_right">Credito do Cliente</th>
                <th class="text_right">Líquido</th>
                <th class="text_center">Status</th>
            </tr>
            @foreach($grupo as $venda)
                <tr>
                    <td>{{$venda->id}}</td>
                    <td class="text_center">{{date('d/m/Y', strtotime($venda->dtvenda))}}</td>
                    <td class="text_right">{{number_format($venda->totalprodutos,2, ',', '.')}}</td>
                    <td class="text_right">{{number_format($venda->descCifra(),2, ',', '.')}}</td>
                    <td class="text_right">{{number_format($venda['creditoaplicado'],2, ',', '.')}}</td>
                    <td class="text_right"> {{number_format($venda->totalliq,2, ',', '.')}}</td>
                    <td class="text_center"><span>{{$venda->statusVenda->nome}}</span></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('numpagina')
    <div style="position: absolute; right: 0; bottom: -100px;">
        <span class="text-right">Página: 1/30</span>
    </div>
@endsection

