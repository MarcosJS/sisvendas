@extends('layouts.painel_produtos')

@section('titulo', 'Produtos')

@section('titulo_conteudo')
    <div id="telanovoproduto" class="row">
        <h4>Cadastro de Produto</h4>
    </div>
@endsection

@section('conteudo_modulo')
    <div class="row mt-3">

        <form action="{{route('adicionarproduto')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{old('nome')}}">
                @error('nome')
                <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <input type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{old('descricao')}}">
                @error('descricao')
                <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label>Estoque</label>
                    <input type="text" class="form-control @error('estoque') is-invalid @enderror" name="estoque" value="{{old('estoque')}}">
                    @error('estoque')
                    <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                    @enderror
                </div>

                <div class="form-group col-sm-6">
                    <label>Preço</label>
                    <input type="text" class="form-control @error('preco') is-invalid @enderror" name="preco" value="{{old('preco')}}">
                    @error('preco')
                    <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                    @enderror
                </div>
            </div>
            <div class="form-row justify-content-sm-center">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
