@extends('layouts.master')

@section('titulo', 'SISVendas PDV')

@section('submenu')
    @include('menu_pdv')
@endsection

@section('conteudo')
    <div class="p-3">
        <div>
            <h1>Operação de Venda - Itens</h1>
            <a href="/vendas/cancelar">Cancelar</a>
            <a href="/vendas/pagamento">Pagamento</a>
        </div>

        <div>
            <div class="row">
                <div class="col-sm-6">
                    <form action="/vendas/itens/adicionar" method="post">
                        {{csrf_field()}}
                        <div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="nomeproduto">Produto</label>
                                    <select id="nomeproduto" class="form-control @error('codproduto') is-invalid @enderror" name="nomeproduto">
                                        <option selected value="" {{ (old("codproduto") == "" ? "selected":"") }}>Produtos...</option>
                                        @foreach($produtos as $produto)
                                            <option value="{{$produto->id}}" {{ (old("codproduto") == $produto->id ? "selected":"") }}>{{$produto->nome}}</option>
                                        @endforeach
                                    </select>
                                    @error('codproduto')
                                    <span>
                                        <small class="text-danger">{{$message}}</small>
                                    </span>
                                    @enderror
                                    <!-- Esses dados são apenas para preencher os campos id e preco através de javascrip -->
                                    @foreach($produtos as $produto)
                                        <input id="{{$produto->id}}" type="hidden" value="{{$produto->preco}}">
                                    @endforeach
                                </div>

                                <div class="form-group col">
                                    <label for="codproduto">Cod.</label>
                                    <input id="codproduto" type="text" class="form-control @error('codproduto') is-invalid @enderror" name="codproduto" value="{{old('codproduto')}}" readonly>
                                    @error('codproduto')
                                    <span>
                                        <small class="text-danger">{{$message}}</small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="qtd">Quantidade</label>
                                    <input id="qtd" type="text" class="form-control @error('qtd') is-invalid @enderror" name="qtd" value="{{old('qtd')}}">
                                    @error('qtd')
                                    <span>
                                        <small class="text-danger">{{$message}}</small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="precofinal">Preço Final</label>
                                    <input id="precofinal" type="text" class="form-control @error('precofinal') is-invalid @enderror" name="precofinal" value="{{old('precofinal')}}">
                                    @error('precofinal')
                                    <span>
                                        <small class="text-danger">{{$message}}</small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="subtotal">Subtotal</label>
                                    <input id="subtotal" type="text" class="form-control @error('subtotal') is-invalid @enderror" name="subtotal" value="{{old('precofinal')}}" readonly>
                                    @error('subtotal')
                                    <span>
                                        <small class="text-danger">{{$message}}</small>
                                    </span>
                                    @enderror
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

                            @if(count($venda->vendaItens) > 0)
                                @foreach($venda->vendaItens as $iten)
                                    <tr>
                                        <td>{{$iten->produto->id}}</td>
                                        <td>{{$iten->produto->nome}}</td>
                                        <td>{{$iten->qtd}}</td>
                                        <td>{{$iten->precofinal}}</td>
                                        <td>{{$iten->subtotal}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr class="bg-success">
                                <td colspan="4" align="right"><b>TOTAL:</b></td>
                                <td>{{$venda->totalprodutos}}</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
