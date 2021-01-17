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
            <th colspan="2" class="text-center">RELAÇÃO DE MOVIMENTOS DE SALÁRIOS</th>
        </tr>
    </table>
@endsection

@section('rodape')
    <span>rodape</span>
@endsection

@section('conteudo')

    <div class="row mt-5">
        <table id="tabelamovimentos" class="table table-striped table-sm table-hover">
            <tr>
                <th>Cod.</th>
                <th>Data</th>
                <th class="text-center">Competência</th>
                <th>Categoria</th>
                <th>Observação</th>
                <th class="text-center">Movimento de Caixa</th>
                <th class="text-right">Valor</th>
            </tr>

            @foreach($movimentos as $m)

                <tr class="linhatabelamovimentos">
                    <td class="col_movimento_id">{{$m->id}}</td>
                    <td>{{date('d/m/Y', strtotime($m->dtmovimento))}}</td>
                    <td class="text-center">
                        {{substr(str_repeat(0, 2).$m->competencia->numero, - 2)}}/{{$m->competencia->exercicio}}</td>
                    <td>{{str_replace('_', ' ', $m->catMovSalario->nome)}}</td>
                    <td>@if($m->observacao != null)
                            <span title="{{$m->observacao}}">{{substr($m->observacao, 0, 25)}}</span>
                        @else Inexistente @endif</td>
                    <td class="text-center">@if($m->movimentoCaixa != null) <span class="badge badge-info">{{$m->movimentoCaixa->tipoMovCaixa->nome}}</span>@else Inexistente @endif</td>
                    <td class="text-right @if($m->tipoMovSalario->id == 1) text-success @else text-danger @endif">{{number_format($m->valor,2, ',', '.')}}</td>
                </tr>
            @endforeach
            <tr>
                <td class="text-right" colspan="6">Total</td>
                <td class="text-right">{{number_format($total,2, ',', '.')}}</td>
            </tr>
        </table>

        @if($colaborador != null)
            <a class="btn btnformout" href="{{route('colaborador', $colaborador->id)}}">
                Colaborador
            </a>
        @endif
    </div>


@endsection

@section('numpagina')
    <div style="position: absolute; right: 0; bottom: -100px;">
        <span class="text-right">Página: 1/30</span>
    </div>
@endsection

