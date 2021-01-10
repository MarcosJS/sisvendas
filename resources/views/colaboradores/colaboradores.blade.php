@extends('layouts.painel_colaborador')

@section('titulo', 'Colaboradores')

@section('titulo_conteudo')
    <div id="telacolaboradores" class="row">
        <h4>Colaboradores</h4>
    </div>
@endsection

@section('conteudo_modulo')
    @include('colaboradores._errors')
    <div class="row mt-3">
        <table class="table table-sm table-hover">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Salário</th>
                <th>Status</th>
            </tr>
            @foreach($colaboradores as $colaborador)
                <tr title="colaborador" class="linhatabelaclick">
                    <td>{{$colaborador->id}}</td>
                    <td>{{$colaborador->nome}}</td>
                    <td>{{$colaborador->cpf}}</td>
                    <td>{{$colaborador->salario}}</td>
                    <td>{{$colaborador->status}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

