@extends('layouts.master')

@section('titulo', 'Informações sobre Produto')

@section('submenu')
    @include('produtos.menu_produtos')
@endsection

@section('conteudo')
    <div class="p-3">
        <h1>Dados do Produto</h1>

        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <span id="id">{{$produto->id}}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <label>{{$produto->nome}}</label>
            </div>
        </div>
        <div class="form-group row">
            <label for="cpf" class="col-sm-2 col-form-label">Estoque</label>
            <div class="col-sm-10">
                <label>{{$produto->estoque}}</label>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Preço</label>
            <div class="col-sm-10">
                <label>{{$produto->preco}}</label>
            </div>
        </div>
        <div class="form-group row">
            <label for="funcao" class="col-sm-2 col-form-label">Descricao</label>
            <div class="col-sm-10">
                <label>{{$produto->descricao}}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button id="produtos" type="button" class="btn btnform btnformedit">Editar</button>
            </div>
        </div>

    </div>
@endsection
