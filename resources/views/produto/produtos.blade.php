@extends('layouts.painel_produtos')

@section('titulo', 'Produtos')

@section('titulo_conteudo')
    <div id="telaprodutos" class="row">
        <h4>Produtos</h4>
    </div>
@endsection

@section('conteudo_modulo')
    <div class="row mt-3">
        <table class="table table-sm table-hover">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Estoque</th>
                <th>Preço</th>
            </tr>
            @foreach($produtos as $produto)
                <tr title="produto" class="linhatabelaclick">
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->descricao}}</td>
                    <td>{{$produto->estoque}}</td>
                    <td>{{$produto->preco}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
