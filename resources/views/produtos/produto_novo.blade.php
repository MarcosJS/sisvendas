@extends('layouts.master')

@section('titulo', 'Estoque')

@section('submenu')
    @include('produtos.menu_produtos')
@endsection

@section('conteudo')
    <div class="p-3">
        <h1>Novo Produto</h1>
        <form action="/produtos/adicionar" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Estoque</label>
                    <input type="text" class="form-control" name="estoque">
                </div>
                <div class="form-group col-md-6">
                    <label>Preço</label>
                    <input type="text" class="form-control" name="preco">
                </div>
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <input type="text" class="form-control" name="descricao">
            </div>

            <button type="submit" class="btn btnform">Cadastrar</button>
        </form>
    </div>
@endsection
