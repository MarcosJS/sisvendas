@extends('layouts.painel_material')

@section('titulo', 'Dados do Material')

@section('titulo_conteudo')
    <div id="teladadosmaterial" class="row">
        <h4>Material</h4>
    </div>
@endsection

@section('conteudo_modulo')
    @error('entrada')
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
                <h4 class="card-title">{{$material->nome}}</h4>
            </div>

            <div class="card-body">
                <p class="card-text">{{$material->descricao}}</p>
                <p><strong>Código: </strong>{{$material->id}}</p>
                <p><strong>Estoque: </strong>{{$material->estoque}}</p>
                <p>
                    <button class="btn btnformout" type="button" data-toggle="collapse" data-target="#collapseEntrada" aria-expanded="false" aria-controls="collapseExample">
                        Registrar entrada
                    </button>
                    <a class="btn btn-outline-primary btnformedit" href="{{route('editarmaterial', $material->id)}}">
                        Editar
                    </a>

                </p>
                <div class="collapse" id="collapseEntrada">
                    @include('material.form_entrada')
                </div>
            </div>

            <div class="card-footer text-center text-primary">
                <div class="row">
                    <div class="col-sm-6 emphasis">
                        <div class="row justify-content-center">
                            <div class="">
                                <h2><strong>{{$entradas}}</strong></h2>
                                <p><small>Entradas</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 emphasis">
                        <h2><strong>{{$saidas}}</strong></h2>
                        <p><small>Saidas</small></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

