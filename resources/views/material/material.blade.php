@extends('layouts.painel_material')

@section('titulo', 'Dados do Material')

@section('titulo_conteudo')
    <div id="teladadosmaterial" class="row">
        <h4>Material</h4>
    </div>
@endsection

@section('conteudo_modulo')
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
                    <button class="btn btnformout" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Realizar uma compra
                    </button>
                    <a class="btn btn-outline-primary btnformedit" href="{{route('editarmaterial', $material->id)}}">
                        Editar
                    </a>

                </p>
                <div class="collapse" id="collapseExample">
                    {{--@include('produto.form_producao')--}}
                </div>
            </div>

            <div class="card-footer text-center text-primary">
                <div class="row">
                    <div class="col-sm-6 emphasis">
                        <div class="row justify-content-center">
                            <div class="">
                                <h2><strong>{{----}}</strong></h2>
                                <p><small>Total Produzido</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 emphasis">
                        <h2><strong>{{----}}</strong></h2>
                        <p><small>Total Vendido</small></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

