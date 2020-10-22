@extends('layouts.master')

@section('titulo', 'Estoque')

@section('submenu')
    @include('produto.produtos_menu_painel')
@endsection

@section('conteudo')
<div>
    <form action="{{route('atualizarproduto', $produto->id)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" value="{{$produto->nome}}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Estoque</label>
                <input type="text" class="form-control" name="estoque" value="{{$produto->estoque}}">
            </div>
            <div class="form-group col-md-6">
                <label>Preço</label>
                <input type="text" class="form-control" name="preco" value="{{$produto->preco}}">
            </div>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" class="form-control" name="descricao" value="{{$produto->descricao}}">
        </div>

        <button type="submit" class="btn btnform">Atualizar</button>
    </form>
</div>
@endsection
