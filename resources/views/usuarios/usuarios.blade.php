@extends('layouts.master')

@section('titulo', 'Painel de Usuários')

@section('submenu')
    @include('usuarios.menu_usuarios')
@endsection

@section('conteudo')
    <div class="p-3">
        <h1>Usuarios</h1>
        <table class="table table-sm table-hover">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">CPF</th>
                <th scope="col">Matricula</th>
                <th scope="col">Status</th>
                <th scope="col">Função</th>
            </tr>
            @foreach($usuarios as $usuario)
                <tr title="usuarios" class="linhatabelaclick">
                    <td scope="row">{{$usuario->id}}</td>
                    <td scope="row">{{$usuario->nome}}</td>
                    <td scope="row">{{$usuario->email}}</td>
                    <td scope="row">{{$usuario->cpf}}</td>
                    <td scope="row">{{$usuario->matricula}}</td>
                    <td scope="row">{{$usuario->status}}</td>
                    <td scope="row">{{$usuario->funcao}}</td>
                </tr>
            @endforeach
        </table>
        <div class="row justify-content-center">
            <button id="usuarios" type="button" class="btnform btnformcad col-auto btn">Novo Usuário</button>
        </div>

    </div>
@endsection
