@extends('layouts.painel_venda')

@section('titulo', 'SISVendas PDV - Todas as Vendas')

@section('titulo_conteudo')
    <div id="telaconsultarvendas" class="row">
        <h4>Todas as vendas</h4>
    </div>
@endsection

@section('conteudo_view')

    <div class="row border rounded mt-3">

        <table id="tabelavendas" class="table table-sm table-hover">
            <tr>
                <th>Cod. Venda</th>
                <th>Data da Venda</th>
                <th>Total</th>
                <th>Desconto</th>
                <th>Líquido</th>
                <th class="text-center">Status</th>
            </tr>

            @foreach($vendas as $v)
                <tr class="linhatabelavendas">
                    <td class="col_venda_id">{{$v->id}}</td>
                    <td>{{date('d/m/Y', strtotime($v->dtvenda))}}</td>
                    <td>{{$v->totalprodutos}}</td>
                    <td>{{$v->descPorcent()}}</td>
                    <td> {{$v->totalliq}}</td>
                    @php
                        $badge = '';
                    @endphp
                    @switch($v->statusVenda->id)
                        @case(1)
                        @php
                            $badge = 'badge-warning';
                        @endphp
                        @break

                        @case(2)
                        @php
                            $badge = 'badge-success';
                        @endphp
                        @break

                        @case(4)
                        @php
                            $badge = 'badge-danger';
                        @endphp
                        @break

                    @endswitch
                    <td class="text-center"><span class="badge {{$badge}}">{{$v->statusVenda->nomestatus}}</span></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
