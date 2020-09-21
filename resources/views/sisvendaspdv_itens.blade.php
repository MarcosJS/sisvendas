@extends('layouts.master')

@section('titulo', 'SISVendas PDV')

@section('submenu')
    @include('menu_pdv')
@endsection

@section('conteudo')
    <div class="p-3">
        <div>
            <h1>Operação de Venda - Itens</h1>
            <a href="/sisvendaspdvitens/cancelar">Cancelar</a>
            <a href="/sisvendaspdvpagamento">Pagamento</a>
        </div>

        <div>
            <div class="row">
                <div class="col-sm-6">
                    <form action="/sisvendaspdvitens/adicionar" method="post">
                        {{csrf_field()}}
                        <div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Produto</label>
                                    <select class="form-control" name="nomeproduto">
                                        <option selected>Produtos...</option>
                                        @foreach($produtos as $produto)
                                            <option>{{$produto->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="inputEmail4">Cod.</label>
                                    <input type="text" class="form-control" name="codproduto">
                                </div>

                                <div class="form-group col">
                                    <label for="inputEmail4">Quantidade</label>
                                    <input type="text" class="form-control" name="qtd">
                                </div>

                                <div class="form-group col">
                                    <label for="inputEmail4">Preço Final</label>
                                    <input type="text" class="form-control" name="precofinal">
                                </div>
                            </div>

                            <button type="submit" class="btn btnform">Adicionar</button>
                        </div>

                    </form>
                </div>

                <div class="col-sm-6 rounded">
                    <div class="border rounded">
                        <table class="table table-sm">
                            <tr>
                                <th>Cod. Produto</th>
                                <th>Nome do Produto</th>
                                <th>Quant</th>
                                <th>Preco Final</th>
                                <th>Subtotal</th>
                            </tr>

                            @if(count($itens) > 0)
                                @foreach($itens as $iten)
                                    <tr>
                                        <td>{{$iten['codproduto']}}</td>
                                        <td>{{$iten['nomeproduto']}}</td>
                                        <td>{{$iten['qtd']}}</td>
                                        <td>{{$iten['precofinal']}}</td>
                                        <td>{{$iten['subtotal']}}</td>
                                    </tr>
                                @endforeach
                            @endif

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
