@extends('layouts.master')

@section('titulo', 'Alteração do Perfil de Usuário')

@section('submenu')
    @include('usuarios.menu_usuarios')
@endsection

@section('conteudo')
    <div>
        <h1>Dados do Usuario</h1>
        <form action="{{route('atualizarusuario', $usuario->id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input id="id" type="text" class="form-control" name="idusuario" value="{{$usuario->id}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" id="nome" class="form-control @error('nome') is-invalid @enderror" name="nome" value="@if(count($errors) > 0){{old('nome')}}@else{{$usuario->nome}}@endif">
                    @error('nome')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="@if(count($errors) > 0){{old('cpf')}}@else{{$usuario->cpf}}@endif" readonly>
                    @error('cpf')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="@if(count($errors) > 0){{old('email')}}@else{{$usuario->email}}@endif">
                    @error('email')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="funcao" class="col-sm-2 col-form-label">Função</label>
                <div class="col-sm-10">
                    <input id="funcao" type="text" class="form-control" name="funcaousuario" value="{{$usuario->funcao->nomefuncao}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="matricula" class="col-sm-2 col-form-label">Matrícula</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="@if(count($errors) > 0){{old('matricula')}}@else{{$usuario->matricula}}@endif">
                    @error('matricula')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btnform">Atualizar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

