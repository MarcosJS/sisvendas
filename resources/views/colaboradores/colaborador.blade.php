@extends('layouts.painel_colaborador')

@section('titulo', 'Dados do Colaborador')

@section('titulo_conteudo')
    <div id="teladadoscolaborador" class="row">
        <h4>Colaborador</h4>
    </div>
@endsection

@section('conteudo_modulo')

    @include('colaboradores._errors')

    <div class="row mt-3">

        <div class="col card text-left ">
            <div class="card-header">
                <h4 class="card-title">{{$colaborador->id}} - {{$colaborador->nome}}</h4>
            </div>

            <div class="card-body">
                <p class="card-text"></p>
                <div class="border-bottom border-success">
                    <h5>Dados Pessoais</h5>
                    <p><strong>Data de Nascimento: </strong>{{$colaborador->dtnascimento}}</p>
                    <p><strong>CPF: </strong>{{$colaborador->cpf}}</p>
                </div>

                <div class="border-bottom border-success mt-3">
                    <h5>Dados Funcionais</h5>
                    <p><strong>Função: </strong>{{$colaborador->funcao->nomefuncao}}</p>
                    <p><strong>Matrícula: </strong>{{$colaborador->matricula}}</p>
                    <p><strong>Salário: </strong>R$ {{$colaborador->salario}}</p>
                    <p><strong>Status: </strong>{{$colaborador->status}}</p>
                </div>

                <div class="border-bottom border-success mt-3">
                    <h5>Endereço e Contatos</h5>
                    <p><strong>Logradouro: </strong>{{$colaborador->endereco->logradouro}}</p>
                    <p><strong>Bairro: </strong>{{$colaborador->endereco->bairro}}</p>
                    <p><strong>Cidade: </strong>{{$colaborador->endereco->cidade}}</p>
                    <p><strong>Telefone: </strong>@if(count($colaborador->telefones) > 0) {{$colaborador->telefones[0]->numerotel}} @endif</p>
                </div>

                <div class="border-bottom border-success mt-3">
                    <p>
                        <a class="btn btnformout" href="{{route('movimentosdocolaborador', $colaborador->id)}}">
                            Movimentos
                        </a>
                        <button class="btn btnformout" type="button" data-toggle="collapse" data-target="#movpagamento" aria-expanded="false" aria-controls="movpagamento">
                            Novo Movimento de Pagamento
                        </button>
                    </p>

                    <div class="collapse" id="movpagamento">

                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    @include('colaboradores._form_mov_pagamento')
                                </div>

                                <div class="col border mb-3">
                                    <p class="text-info">
                                        Competência Atual: <strong>{{$competencia->numero}}</strong>
                                    </p>
                                    <table class="table table-sm table-striped">
                                        @foreach($movimentos as $movimento)
                                        <tr class="@if($movimento->valor < 0) text-danger @else text-success @endif">
                                            <td>{{$movimento->catMovSalario->nome}}</td>
                                            <td class="text-right">{{$movimento->valor}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>Saldo salarial na competência:</td>
                                            <td class="text-right">{{$saldoSalario}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-3">
                    <p>
                        <a class="btn btn-outline-primary btnformedit" href="{{route('editarcolaborador', $colaborador->id)}}">
                            Editar
                        </a>
                    </p>
                </div>

            </div>

        </div>

    </div>
@endsection

