@extends('layouts.painel_cliente')

@section('titulo', 'Dados do Cliente')

@section('titulo_conteudo')
    <div id="teladadosproduto" class="row">
        <h4>Cliente</h4>
    </div>
@endsection

@section('conteudo_modulo')
    <div class="row mt-3">

        <div class="col card text-left ">
            <div class="card-header">
                <h4 class="card-title">{{$cliente->nome}}</h4>
            </div>

            <div class="card-body">
                <p><strong>ID: </strong>{{$cliente->id}}</p>
                <p><strong>Data Nascimento: </strong>{{$cliente->datanasc}}</p>
                <p><strong>CPF: </strong>{{$cliente->cpf}}</p>
                <p><strong>Compras no Vale: </strong>@if($cliente->modcredito) SIM @else NÃO @endif</p>
                <p><strong>Ativo: </strong>@if($cliente->status) SIM @else NÃO @endif</p>
                <p>
                    <a class="btn btn-outline-primary btnformedit" href="{{route('editarcliente', $cliente->id)}}">
                        Editar
                    </a>
                </p>
            </div>

            <div class="card-footer text-center text-primary">
                <div class="row">
                    <div class="col-sm-6 emphasis">
                        <div class="row justify-content-center">
                            <div class="">
                                <h2><strong>999</strong></h2>
                                <p><small>Contas a pagar</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 emphasis">
                        <h2><strong>999</strong></h2>
                        <p><small>Compras realizadas</small></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
