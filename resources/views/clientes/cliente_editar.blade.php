@extends('layouts.master')

@section('titulo', 'Alteração do Perfil do Cliente')

@section('submenu')
    @include('clientes.menu_clientes')
@endsection

@section('conteudo')
    <div>
        <h1>Dados do Cliente</h1>
        <form action="/clientes/atualizar/{{$cliente->id}}" method="post">
            {{csrf_field()}}
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="idcliente" value="{{$cliente->id}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nome" value="{{$cliente->nome}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Data de Nascimento</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="datanasc" value="{{$cliente->datanasc}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">CPF</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cpf" value="{{$cliente->cpf}}">
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
