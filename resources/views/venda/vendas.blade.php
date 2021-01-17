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
                <th class="text-right">Total</th>
                <th class="text-right">Desconto R$</th>
                <th class="text-right">Credito do Cliente</th>
                <th class="text-right">Líquido</th>
                <th class="text-center">Status</th>
                <th class="text-center"><a class="btn-sm btn-outline-primary" href="{{route('imprimirvendas')}}" role="button">Exportar</a></th>
            </tr>

            @foreach($vendas as $v)
                <tr class="linhatabelavendas">
                    <td class="col_venda_id">{{$v->id}}</td>
                    <td>{{date('d/m/Y', strtotime($v->dtvenda))}}</td>
                    <td class="text-right">{{number_format($v->totalprodutos,2, ',', '.')}}</td>
                    <td class="text-right">{{number_format($v->descCifra(),2, ',', '.')}}</td>
                    <td class="text-right">{{number_format($v['creditoaplicado'],2, ',', '.')}}</td>
                    <td class="text-right"> {{number_format($v->totalliq,2, ',', '.')}}</td>
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
                    <td class="text-center"><span class="badge {{$badge}}">{{$v->statusVenda->nome}}</span></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
