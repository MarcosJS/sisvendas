@extends('layouts.painel_caixa')

@section('titulo', 'SISVendas PDV - Contas à Receber')

@section('controles')
    <div class="container">
        @include('caixa.contasareceber._control_contas_receber')
    </div>
@endsection

@section('conteudo_view')

    <div class="row mt-5 pt-4">
        @include('caixa._errors')
        <table id="tabelavales" class="table table-striped table-sm table-hoverr">
            <tr>
                <th>Cod.</th>
                <th>Lançamento</th>
                <th>Vencimento</th>
                <th class="text-right">Valor</th>
                <th>Cliente</th>
                <th></th>
            </tr>

            @foreach($vales as $v)
                <tr class="linhatabelavales">
                    <td class="col_vale_id">{{$v->id}}</td>
                    <td>{{date('d/m/Y', strtotime($v->dtlancamento))}}</td>
                    <td>{{date('d/m/Y', strtotime($v->dtvencimento))}}</span></td>
                    <td class="text-right">{{number_format($v->valor,2, ',', '.')}}</td>
                    <td>{{$v->venda->cliente->nome}}</td>
                    <td><a class="badge badge-info" href="#">Quitar</a></td>
                 </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('rodape')
    <div class="container">
        @include('caixa.contasareceber._totais_contas_receber')
    </div>
@endsection

