@extends('layouts.master')

@section('titulo', 'Cadastro de Usuário')

@section('submenu')
    @include('menu_usuarios')
@endsection

@section('conteudo')
    <div class="p-3">
        <h1>Novo Usuario</h1>
        <form action="/usuarios/adicionar" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome">
            </div>
            <div class="form-group">
                <label>CPF</label>
                <input type="text" class="form-control" name="cpf">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group col-md-6">
                    <label>Senha</label>
                    <input type="password" class="form-control" name="senha">
                </div>
            </div>
            <div class="form-group">
                <label>Função</label>
                <input type="text" class="form-control" name="funcao">
            </div>
            <div class="form-group">
                <label>Matrícula</label>
                <input type="text" class="form-control" name="matricula">
            </div>

            <button type="submit" class="btn btnformusuario">Cadastrar</button>
        </form>
    </div>
@endsection
