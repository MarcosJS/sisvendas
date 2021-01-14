@extends('layouts.painel_colaborador')

@section('titulo', 'Movimento do Colaborador')

@section('controles')
    <div class="container">
        @include('colaboradores._control_colabolador_mov')
    </div>
@endsection

@section('conteudo_modulo')

    <div class="row mt-5">
        @include('colaboradores._errors')
    <table id="tabelamovimentos" class="table table-striped table-sm table-hover">
        <tr>
            <th>Cod.</th>
            <th>Data</th>
            <th class="text-center">Competência</th>
            <th class="text-center">Tipo</th>
            <th>Categoria</th>
            <th>Observação</th>
            <th class="text-center">Movimento de Caixa</th>
            <th class="text-right">Valor</th>
            <th class="text-center"><a class="btn-sm btn-outline-primary" href="{{route('imprimirmovimentosdesalario')}}" role="button">Exportar</a></th>
        </tr>

        @foreach($movimentos as $m)
            @php
                $bg = '';
            @endphp
            @switch($m->tipoMovSalario->id)
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
                <td>{{date('d/m/Y', strtotime($m->dtmovimento))}}</td>
                <td class="text-center">
                    {{substr(str_repeat(0, 2).$m->competencia->numero, - 2)}}/{{$m->competencia->exercicio}}</td>
                <td class="text-center"><span class="badge {{$badge}}">{{$m->tipoMovSalario->nome}}</span></td>
                <td>{{$m->catMovSalario->nome}}</td>
                <td>@if($m->observacao != null)
                        <span title="{{$m->observacao}}">{{substr($m->observacao, 0, 25)}}</span>
                    @else Inexistente @endif</td>
                <td class="text-center">@if($m->movimentoCaixa != null) <span class="badge badge-info">{{$m->movimentoCaixa->tipoMovCaixa->nome}}</span>@else Inexistente @endif</td>
                <td class="text-right @if($m->tipoMovSalario->id == 1) text-success @else text-danger @endif">{{number_format($m->valor,2, ',', '.')}}</td>
                <td class="text-center"><a class="badge-danger badge" href="{{route('excluirmovimentosalario', $m->id)}}">Remover</a></td>
            </tr>
        @endforeach
        <tr>
            <td class="text-right" colspan="7">Total</td>
            <td class="text-right">{{number_format($total,2, ',', '.')}}</td>
            <td></td>
        </tr>
    </table>

        @if($colaborador != null)
            <a class="btn btnformout" href="{{route('colaborador', $colaborador->id)}}">
                Colaborador
            </a>
        @endif
</div>

@endsection
