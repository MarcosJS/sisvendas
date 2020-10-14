@extends('layouts.conteudo_painel_venda')

@section('titulo', 'SISVendas PDV - Todas as Vendas')

@section('titulo_conteudo')
    <div id="telaconsultarvendas" class="row">
        <h4>Todas as vendas</h4>
    </div>
@endsection

@section('conteudo_view')

    <div class="row border rounded mt-3">

        <table class="table table-sm table-hover">
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
                    <td>{{$v->id}}</td>
                    <td>{{date('d/m/Y', strtotime($v->dtvenda))}}</td>
                    <td>{{$v->totalprodutos}}</td>
                    <td>{{$v->descPorcent()}}</td>
                    <td> {{$v->totalliq}}</td>
                    @php
                        $bgColor = '';
                    @endphp
                    @switch($v->statusVenda->id)
                        @case(1)
                        @php
                            $bgColor = 'bg-warning';
                        @endphp
                        @break

                        @case(2)
                        @php
                            $bgColor = 'bg-success';
                        @endphp
                        @break

                        @case(3)
                        @php
                            $bgColor = 'bg-danger';
                        @endphp
                        @break
                    @endswitch
                    <td class="{{$bgColor}} text-center">{{$v->statusVenda->nomestatus}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
