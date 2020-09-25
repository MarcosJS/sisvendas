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
            <div class="row">
                <div class="col-md-4">
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
                    <div class="form-group">
                        <label>Estoque</label>
                        <input type="text" class="form-control @error('estoque') is-invalid @enderror" name="estoque" value="{{old('estoque')}}">
                        @error('estoque')
                        <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Preço</label>
                        <input type="text" class="form-control @error('preco') is-invalid @enderror" name="preco" value="{{old('preco')}}">
                        @error('preco')
                        <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btnform">Cadastrar</button>
        </form>
    </div>
@endsection
