@extends('layouts.master')

@section('titulo', 'Alteração do Perfil de Usuário')

@section('submenu')
    @include('menu_usuarios')
@endsection

@section('conteudo')
    <div>
        <h1>Dados do Usuario</h1>
        <form action="/usuarios/atualizar/{{$usuario->id}}" method="post">
            {{csrf_field()}}
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="idusuario" value="{{$usuario->id}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nomeusuario" value="{{$usuario->nome}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cpfusuario" value="{{$usuario->cpf}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="emailusuario" value="{{$usuario->email}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="funcao" class="col-sm-2 col-form-label">Função</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="funcaousuario" value="{{$usuario->funcao}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="matricula" class="col-sm-2 col-form-label">Matrícula</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="matriculausuario" value="{{$usuario->matricula}}">
                </div>
            </div>


            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Ativo</legend>
                    <div class="col-sm-10">
                        <div class="form-check custom-control-inline">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Sim
                            </label>
                        </div>
                        <div class="form-check custom-control-inline">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                            <label class="form-check-label" for="gridRadios2">
                                Não
                            </label>
                        </div>

                    </div>
                </div>
            </fieldset>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btnformusuario">Atualizar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

