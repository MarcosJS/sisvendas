@extends('layouts.conteudo_painel_venda')

@section('titulo', 'SISVendas PDV - Dados da Venda')

@section('titulo_conteudo')
    <div id="telavenda" class="row">
        <h4>Dados da Venda</h4>
    </div>
@endsection

@section('conteudo_view')
    @error('warning')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Atenção: </strong> {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    <div class="row mt-3">
        <a href="{{route('ativarvenda', $venda->id)}}" class="btn btnform">Ativar</a>
    </div>
    <div class="row border rounded mt-3">

        <table class="table table-sm">
            <tr>
                <th>Cod. Produto</th>
                <th>Nome do Produto</th>
                <th>Quant</th>
                <th>Preço de Tabela</th>
                <th>Preco Final</th>
                <th class="text-right">Subtotal</th>
            </tr>

            @foreach($itens as $iten)
                <tr>
                    <td>{{$iten->produto->id}}</td>
                    <td>{{$iten->produto->nome}}</td>
                    <td>{{$iten->qtd}}</td>
                    <td>{{$iten->produto->preco}}</td>
                    <td>{{$iten->precofinal}}</td>
                    <td class="text-right">{{$iten->subtotal}}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="row pb-0 mt-3">
        <div class="col pb-0 border rounded">
            <div class="row">
                <div class="col">
                    <h4>Venda nº <b>{{$venda->id}}</b></h4>
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
                    $bgColor = '';
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

    <div class="row border rounded mt-3 border-success">
        <h4>Pagamentos</h4>
        <table class="table table-sm table-hover table-success mb-0">
            <tr>
                <th>Valor R$</th>
                <th>Tipo</th>
                <th>Data</th>
                <th></th>
            </tr>

            @foreach($pagamentos as $pag)
                <tr>
                    <td>{{$pag->valor}}</td>
                    <td>{{$pag->tipo}}</td>
                    <td>{{date('d/m/Y', strtotime($pag->dtpagamento))}}</td>
                    <td class="text-center"><a class="badge-info badge" href="#">Acessar</a></td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="row mt-3">
        <div class="card col">
            <h5 class="card-header">Cliente</h5>
            @if($cliente != null)
                <div class="card-body">
                    <h5 class="card-title">{{$cliente->nome}}</h5>
                    <p class="card-text">CPF: {{$cliente->cpf}}</p>
                    <a href="{{route('cliente', ['id' => $cliente->id])}}" class="btn btnform btn-primary">Acessar</a>
                </div>
            @endif
        </div>

        <div class="card col ml-3">
            <h5 class="card-header">Usuario</h5>
            <div class="card-body">
                <h5 class="card-title">{{$usuario->nome}}</h5>
                <p class="card-text">ID: {{$usuario->id}}</p>
            </div>
        </div>
    </div>

@endsection
