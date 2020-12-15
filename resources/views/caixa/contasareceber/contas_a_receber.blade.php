@extends('layouts.painel_caixa')

@section('titulo', 'SISVendas PDV - Contas à Receber')

@section('controles')
    <div class="container">
        @include('caixa.contasareceber._control_contas_receber')
    </div>
@endsection

@section('conteudo_view')

    <div class="row mt-5 pt-4">

        <table id="tabelamovimentos" class="table table-striped table-sm table-hover">
            <tr>
                <th>Cod.</th>
                <th>Lançamento</th>
                <th>Hora</th>
                <th>Vencimento</th>
                <th class="text-right">Valor</th>
                <th>Cliente</th>
            </tr>

            @foreach($vales as $v)
                <tr class="linhatabelamovimentos">
                    <td class="col_movimento_id">{{$v->id}}</td>
                    <td>{{date('d/m/Y', strtotime($v->dtlancamento))}}</td>
                    <td>à incluir</td>
                    <td >{{date('d/m/Y', strtotime($v->dtvencimento))}}</span></td>
                    <td class="text-right">{{$v->valor}}</td>
                    <td>{{$v->venda->cliente->nome}}</td>
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

