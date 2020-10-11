@extends('layouts.master')

@section('titulo', 'Painel de Clientes')

@section('submenu')
    @include('clientes.menu_clientes')
@endsection

@section('conteudo')
<div class="p-3">
    <h1>Clientes</h1>

    <table class="table table-sm table-hover">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">CPF</th>
            <th scope="col">Credito Abilitado</th>
            <th scope="col">Status</th>
            <th scope="col">Endereco</th>
            <th scope="col">Telefone</th>
        </tr>
        @foreach($clientes as $cliente)
            <tr title="clientes" class="linhatabelaclick">
                <td scope="row">{{$cliente->id}}</td>
                <td scope="row">{{$cliente->nome}}</td>
                <td scope="row">{{$cliente->datanasc}}</td>
                <td scope="row">{{$cliente->cpf}}</td>
                <td scope="row">{{$cliente->modcredito}}</td>
                <td scope="row">{{$cliente->status}}</td>
                <td scope="row">{{$cliente->endereco->cidade}}</td>
                @if(count($cliente->telefones) > 0)
                <td scope="row">{{$cliente->telefones[0]->numerotel}}</td>
                @endif
            </tr>
        @endforeach
    </table>
    <div class="row justify-content-center">
        <button id="clientes" type="button" class="btnformcad btnform col-auto btn">Novo Cliente</button>
    </div>
</div>
@endsection
