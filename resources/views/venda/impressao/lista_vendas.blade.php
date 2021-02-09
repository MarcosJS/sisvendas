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

        <table style="width: 100%; border: 1px solid black">
            <tr>
                <th style="width: 8%;">Cod.</th>
                <th style="width: 12%;" class="text_center">Data</th>
                <th class="text_right td_vendas">Total</th>
                <th class="text_right td_vendas">Desconto</th>
                <th class="text_right td_vendas">Líquido</th>
                <th style="width: 14%;" class="text_center">Status</th>
            </tr>
            @foreach($grupo as $venda)
                <tr>
                    <td style="width: 8%;">{{$venda->id}}</td>
                    <td style="width: 12%;" class="text_center">{{date('d/m/Y', strtotime($venda->dtvenda))}}</td>
                    <td class="text_right td_vendas">{{number_format($venda->totalprodutos,2, ',', '.')}}</td>
                    <td class="text_right td_vendas">{{number_format($venda->descCifra(),2, ',', '.')}}</td>
                    <td class="text_right td_vendas"> {{number_format($venda->totalliq,2, ',', '.')}}</td>
                    <td style="width: 14%;" class="text_center"><span>{{$venda->statusVenda->nome}}</span></td>
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

