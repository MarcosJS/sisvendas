@extends('layouts.painel_colaborador')

@section('titulo', 'Fechamento de Competência')

@section('titulo_conteudo')
    <div id="telacolaboradores" class="row">
        <h4>Pagamentos realizados na competência <span class="text-info">{{substr(str_repeat(0, 2).$competencia->numero, - 2)}}/{{$competencia->exercicio}}</span></h4>
    </div>
@endsection

@section('conteudo_modulo')
    @include('colaboradores._errors')

    @if($advertencia != null)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>ATENÇÃO: </strong>{{$advertencia}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row mt-3">
        <table id="tabelamovimentos" class="table table-striped table-sm table-hover">
            <tr>
                <th>Cod. Colaborador</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Cod. Movimento</th>
                <th class="text-right">Pagamento</th>
            </tr>

            @foreach($colaboradores as $c)
                <tr title="colaborador" class="linhatabelaclick">
                    <td>{{$c['colaborador']->id}}</td>
                    <td>{{$c['colaborador']->nome}}</td>
                    <td>{{$c['colaborador']->cpf}}</td>

                    @php
                        $bg = '';
                    @endphp

                    @if($c['movimento'] != null)
                        @switch($c['movimento']->tipoMovSalario->id)
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

                            <td>{{$c['movimento']->id}}</td>
                            <td class="text-right"><span class="badge {{$badge}}">{{$c['movimento']->valor}}</span></td>
                        @else
                        <td></td>
                        <td></td>
                    @endif
                </tr>
            @endforeach
        </table>

        <a class="btn btnformout" href="{{route('fecharcompetencia')}}">
            Fechar Competência
        </a>
    </div>
@endsection


