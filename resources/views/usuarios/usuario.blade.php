@extends('layouts.master')

@section('titulo', 'Perfil de Usuário')

@section('submenu')
    @include('usuarios.menu_usuarios')
@endsection

@section('conteudo')
    <div class="p-3">
        <h1>Usuário</h1>

        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <span id="id">{{$usuario->id}}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <label>{{$usuario->nome}}</label>
            </div>
        </div>
        <div class="form-group row">
            <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
            <div class="col-sm-10">
                <label>{{$usuario->cpf}}</label>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <label>{{$usuario->email}}</label>
            </div>
        </div>
        <div class="form-group row">
            <label for="funcao" class="col-sm-2 col-form-label">Função</label>
            <div class="col-sm-10">
                <label>{{$usuario->funcao->nomefuncao}}</label>
            </div>
        </div>
        <div class="form-group row">
            <label for="matricula" class="col-sm-2 col-form-label">Matrícula</label>
            <div class="col-sm-10">
                <label>{{$usuario->matricula}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button id="usuarios" type="button" class="btn btnform btnformedit">Editar</button>
            </div>
        </div>

    </div>
@endsection
