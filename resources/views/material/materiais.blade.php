@extends('layouts.painel_material')

@section('titulo', 'Cadastramento de um novo material na produção')

@section('titulo_conteudo')
    <div id="telanovormaterial" class="row">
        <h4>Material</h4>
    </div>
@endsection

@section('conteudo_modulo')
    <div class="row mt-3">
        <table class="table table-sm table-hover">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Estoque</th>
            </tr>
            @foreach($materiais as $material)
                <tr title="material" class="linhatabelaclick">
                    <td>{{$material->id}}</td>
                    <td>{{$material->nome}}</td>
                    <td>{{$material->descricao}}</td>
                    <td>{{$material->estoque}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

