@extends('layouts.painel_produto')

@section('titulo', 'Dados do Produto')

@section('titulo_conteudo')
    <div id="teladadosproduto" class="row">
        <h4>Produto</h4>
    </div>
@endsection

@section('conteudo_modulo')

        @error('producao')
            <div class="row">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erro: </strong>{{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @enderror

    <div class="row mt-3">

        <div class="col card text-left ">
            <div class="card-header">
                <h4 class="card-title">{{$produto->nome}}</h4>
            </div>

            <div class="card-body">
                <p class="card-text">{{$produto->descricao}}</p>
                <p><strong>Código: </strong>{{$produto->id}}</p>
                <p><strong>Estoque: </strong>{{$produto->estoque}}</p>
                <p><strong>Preço Unitário: </strong>R$ {{$produto->preco}}</p>
                <p>
                    <button class="btn btnformout" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Informar Entrada
                    </button>
                    <button class="btn btnformout" type="button" data-toggle="collapse" data-target="#formComposicao" aria-expanded="false" aria-controls="formComposicao">
                        Composicao
                    </button>
                    <a class="btn btn-outline-primary btnformedit" href="{{route('editarproduto', $produto->id)}}">
                        Editar
                    </a>

                </p>
                <div class="collapse" id="collapseExample">
                    @include('produto.form_producao')
                </div>
                <div class="collapse" id="formComposicao">
                    @include('produto.form_composicao')
                </div>
            </div>

            <div class="card-footer text-center text-primary">
                <div class="row">
                    <div class="col-sm-6 emphasis">
                        <div class="row justify-content-center">
                            <div class="">
                                <h2><strong>{{$producao}}</strong></h2>
                                <p><small>Total Produzido</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 emphasis">
                        <h2><strong>{{$vendas}}</strong></h2>
                        <p><small>Total Vendido</small></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
