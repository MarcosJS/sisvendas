@extends('layouts.painel_produto')

@section('titulo', 'Edição do Produto')

@section('titulo_conteudo')
    <div id="telaeditarproduto" class="row">
        <h4>Produto</h4>
    </div>
@endsection

@section('conteudo_modulo')
    <div class="row mt-3">

        <form action="{{route('atualizarproduto', $produto->id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" class="form-control @error('nome') is-invalid @enderror" name="nome" value="@if(count($errors) > 0){{old('nome')}}@else{{$produto->nome}}@endif">
                @error('nome')
                <span>
                    <small class="text-danger">{{$message}}</small>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="@if(count($errors) > 0){{old('descricao')}}@else{{$produto->descricao}}@endif">
                @error('descricao')
                <span>
                    <small class="text-danger">{{$message}}</small>
                </span>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="estoque">Estoque</label>
                    <input type="text" id="estoque" class="form-control @error('estoque') is-invalid @enderror" name="estoque" value="@if(count($errors) > 0){{old('estoque')}}@else{{$produto->estoque}}@endif">
                    @error('estoque')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="preco">Preço</label>
                    <input type="text" id="preco" class="form-control @error('preco') is-invalid @enderror" name="preco" value="@if(count($errors) > 0){{old('preco')}}@else{{$produto->preco}}@endif">
                    @error('preco')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row justify-content-sm-center">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
    </div>
@endsection
