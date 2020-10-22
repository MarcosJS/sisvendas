@extends('layouts.painel_produtos')

@section('titulo', 'Produtos')

@section('titulo_conteudo')
    <div id="telaprodutos" class="row">
        <h4>Produtos</h4>
    </div>
@endsection

@section('conteudo_modulo')
    <div class="p-3">

        <table class="table table-sm table-hover">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Estoque</th>
                <th>Preço</th>
            </tr>
            @foreach($produtos as $produto)
                <tr title="produtos" class="linhatabelaclick">
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->descricao}}</td>
                    <td>{{$produto->estoque}}</td>
                    <td>{{$produto->preco}}</td>
                </tr>
            @endforeach
        </table>

        <div class="row justify-content-center">
            <button id="produtos" type="button" class="btnform btnformcad col-auto btn">Novo Produto</button>
        </div>
    </div>
@endsection
