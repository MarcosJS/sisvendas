@extends('layouts.master')

@section('titulo', 'Perfil do Cliente')

@section('submenu')
    @include('clientes.menu_clientes')
@endsection

@section('conteudo')
    <div class="p-3">
        <h1>Cliente</h1>

        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <span id="id">{{$cliente->id}}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <label>{{$cliente->nome}}</label>
            </div>
        </div>
        <div class="form-group row">
            <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
            <div class="col-sm-10">
                <label>{{$cliente->cpf}}</label>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <label>{{$cliente->email}}</label>
            </div>
        </div>
        <div class="form-group row">
            <label for="funcao" class="col-sm-2 col-form-label">Função</label>
            <div class="col-sm-10">
                <label>{{$cliente->funcao}}</label>
            </div>
        </div>
        <div class="form-group row">
            <label for="matricula" class="col-sm-2 col-form-label">Matrícula</label>
            <div class="col-sm-10">
                <label>{{$cliente->matricula}}</label>
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
                <button id="clientes" type="button" class="btn btnform btnformedit">Editar</button>
            </div>
        </div>

    </div>
@endsection
