@extends('layouts.operacao_venda')

@section('titulo', 'SISVendas PDV - Pagamento')

@section('titulo_conteudo')
    <div id="telapagamento" class="row">
        <h4>Operação de Venda - Pagamento</h4>
    </div>
@endsection

@section('conteudo_view')
    <div class="row mt-3">
        <div class="col border rounded">
            <table class="table table-sm">
                <tr>
                    <th>Cod. Produto</th>
                    <th>Nome do Produto</th>
                    <th>Quant</th>
                    <th>Preco Final</th>
                    <th class="text-right">Subtotal</th>
                </tr>

                @if(count($venda->vendaItens) > 0)
                    @foreach($venda->vendaItens as $iten)
                        <tr>
                            <td>{{$iten->produto->id}}</td>
                            <td>{{$iten->produto->nome}}</td>
                            <td>{{$iten->qtd}}</td>
                            <td>{{$iten->precofinal}}</td>
                            <td class="text-right">{{$iten->subtotal}}</td>
                        </tr>
                    @endforeach
                @endif
                <tr >
                    <td colspan="4" class="text-right"><b>Total R$:</b></td>
                    <td id="totalprodutos" class="text-right">{{$venda->totalprodutos}}</td>
                </tr>
                <tr >
                    <td colspan="4" class="text-right"><label for="novodesconto"><b>Desconto %:</b></label></td>
                    <td class="text-right"><input id="novodesconto" class="form-control text-right" type="text" value="{{$venda->descPorcent()}}" name="novodesconto"></td>
                </tr>
                <tr class="bg-success">
                    <td colspan="4" class="text-right"><b>LÍQUIDO R$:</b></td>
                    <td id="totalliq" class="text-right"><b>{{$venda->totalliq}}</b></td>
                </tr>
                <input id="totalliqfinal" type="hidden" value="{{$venda->totalliq}}">
            </table>

            <form action="{{route('aplicardesconto')}}" method="post">
            {{csrf_field()}}
                <input id="desconto" type="hidden" value="{{$venda->descPorcent()}}" name="desconto">

                <div class="form-row justify-content-center">
                    <button type="submit" class="btn btnform">Aplicar</button>
                </div>
            </form>
        </div>

        <div class="col border rounded">
            <h4>Forma de Pagamento</h4>

            <div class="row">
                <div class="col">
                    <button type="button" class="col btn btn-outline-primary btn-lg btn-block rounded-0" data-toggle="modal" data-target="#formdinheiro">
                        DINHEIRO
                    </button>
                </div>
                <div class="col">
                    <button type="button" class="col btn btn-outline-primary btn-lg btn-block rounded-0" data-toggle="modal" data-target="#formcheque">
                        CHEQUE
                    </button>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <button type="button" class="col btn btn-outline-primary btn-lg btn-block rounded-0" data-toggle="modal" data-target="#exampleModalCenter" disabled>
                        TRANSFERÊNCIA
                    </button>
                </div>
                <div class="col">
                    <button type="button" class="col btn btn-outline-primary btn-lg btn-block rounded-0" data-toggle="modal" data-target="#exampleModalCenter" disabled>
                        VALE
                    </button>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-6">
                    <button type="button" class="col btn btn-outline-primary btn-lg btn-block rounded-0" data-toggle="modal" data-target="#exampleModalCenter" disabled>
                        CARTÃO
                    </button>
                </div>
            </div>

        </div>
    </div>

    <div class="row pb-0 mt-3">
        <div class="col pb-0 border rounded">
            <div class="row">
                <div class="col">
                    <h4 id="col_venda_id">Venda nº {{$venda->id}}</h4>
                </div>
                <div class="col">
                    <p class="float-right">{{date('d/m/Y', strtotime($venda->dtvenda))}}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm card text-white bg-secondary" style="max-width: 18rem;">
                    <div class="card-header">Total</div>
                    <div class="card-body">
                        <h1 class="card-title">R$ {{$venda->totalprodutos}}</h1>
                    </div>
                </div>
                <div class="col-sm ml-3 card text-white bg-dark" style="max-width: 18rem;">
                    <div class="card-header">Desconto</div>
                    <div class="card-body">
                        <h1 class="card-title">{{$venda->descPorcent()}}%</h1>
                    </div>
                </div>
                <div class="col-sm ml-3 card text-white bg-primary" style="max-width: 18rem;">
                    <div class="card-header">Líquido</div>
                    <div class="card-body">
                        <h1 class="card-title">R$ {{$venda->totalliq}}</h1>
                    </div>
                </div>
                @php
                    $bgColor = 'bg-warning';
                @endphp
                @switch($venda->statusVenda->id)
                    @case(1)
                    @php
                        $bgColor = 'bg-warning';
                    @endphp
                    @break
                    @case(2)
                    @php
                        $bgColor = 'bg-success';
                    @endphp
                    @break
                    @case(3)
                    @php
                        $bgColor = 'bg-danger';
                    @endphp
                    @break

                @endswitch
                <div class="col-sm ml-3 card text-black-50 {{$bgColor}}" style="max-width: 18rem;">
                    <div class="card-header">Status da Venda</div>
                    <div class="card-body">
                        <h2 class="card-title">{{$venda->statusVenda->nomestatus}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(count($pagamentos) > 0)
        <div class="row border rounded mt-3 border-success">
            <h4>Pagamentos</h4>

            <table class="table table-sm table-hover table-success mb-0">
                <tr>
                    <th>Valor R$</th>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($pagamentos as $pag)
                    @include('pagamentos._pagamento')
                @endforeach
            </table>
        </div>
    @endif

    <div class="row mt-3">
        <div class="card col">
            <h5 class="card-header">Cliente</h5>
                <div class="card-body">
                    @if($cliente != null)
                    <h5 class="card-title">{{$cliente->nome}}</h5>
                    <p class="card-text">CPF: {{$cliente->cpf}}</p>
                    <a href="{{route('cliente', ['id' => $cliente->id])}}" class="btn btnform btn-primary">Acessar</a>
                    <a class="btn btn-outline-danger" href="{{route('desvincularcliente')}}" role="button">Desvincular</a>

                    @elseif($nomecliente != null)
                    <h5 class="card-title">{{$nomecliente}}</h5>
                    <a class="btn btn-outline-danger" href="{{route('desvincularcliente')}}" role="button">Desvincular</a>

                    @else
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Atenção!</strong> Considere vincular um cliente
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('incluirnomecliente')}}" method="post">
                        @csrf()
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('nomecliente') is-invalid @enderror" placeholder="Nome" aria-label="Recipient's username" aria-describedby="basic-addon2" name="nomecliente">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Salvar</button>
                            </div>
                        </div>
                        @error('nomecliente')
                        <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                        @enderror
                    </form>

                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#listaclientes">
                        Vincular cliente exitente
                    </button>
                    @endif
                </div>
        </div>

        <div class="card col ml-3">
            <h5 class="card-header">Usuario</h5>
            <div class="card-body">
                <h5 class="card-title">{{auth()->user()->nome}}</h5>
                <p class="card-text">ID: {{auth()->user()->id}}</p>
            </div>
        </div>
    </div>

    <!-- TELAS DE FORMULÁRIOS DE PAGAMENTO -->
    @include('clientes.lista_clientes')
    @include('pagamentos.form_cheque')
    @include('pagamentos.form_dinheiro')
@endsection
