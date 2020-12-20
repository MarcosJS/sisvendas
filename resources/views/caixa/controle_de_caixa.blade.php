    @extends('layouts.painel_caixa')

@section('titulo', 'SISVendas PDV - Controle de Caixa')

@section('controles')
    <div class="container">
        @include('caixa._control_controle_caixa')
    </div>
@endsection

@section('conteudo_view')

    <div class="row mt-5 pt-4">

        <table id="tabelamovimentos" class="table table-striped table-sm table-hover">
            <tr>
                <th>Cod.</th>
                <th>Data</th>
                <th>Hora</th>
                <th class="text-center">Tipo</th>
                <th>Categoria</th>
                <th>Observação</th>
                <th class="text-right">Valor</th>
                <th class="text-center">Pagamento</th>
            </tr>

            @foreach($movimentos as $m)
                @php
                    $bg = '';
                @endphp
                @switch($m->tipoMovCaixa->id)
                    @case(1)
                    @php
                        $badge = 'badge-success';
                    @endphp
                    @break

                    @case(2)
                    @php
                        $badge = 'badge-danger';
                    @endphp
                    @break

                @endswitch

                <tr class="linhatabelamovimentos">
                    <td class="col_movimento_id">{{$m->id}}</td>
                    <td>{{date('d/m/Y', strtotime($m->dt_movimento))}}</td>
                    <td>{{$m->hr_movimento}}</td>
                    <td class="text-center"><span class="badge {{$badge}}">{{$m->tipoMovCaixa->nome}}</span></td>
                    <td>{{$m->catMovCaixa->nome}}</td>
                    <td>@if($m->observacao != null)
                            <span title="{{$m->observacao}}">{{substr($m->observacao, 0, 25)}}</span>
                        @else Inexistente @endif</td>
                    <td class="text-right @if($m->tipoMovCaixa->id == 1) text-success @else text-danger @endif">{{$m->valor}}</td>
                    <td class="text-center">@if($m->pagamento != null) <span class="badge badge-info">{{$m->pagamento->tipo}}</span>@else Inexistente @endif</td>
                 </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('rodape')
    <div class="container">
        @include('caixa._totais_movimentos')
    </div>
@endsection

