@extends('layouts.painel_cliente')

@section('titulo', 'Alteração do Perfil do Cliente')

@section('titulo_conteudo')
    <div id="telaeditarcliente" class="row">
        <h4>Cliente</h4>
    </div>
@endsection

@section('conteudo_modulo')
    <div class="row mt-3 p-3">

        <form action="{{route('atualizarcliente', $cliente->id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group row">
                <label for="idcliente" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" id="idcliente" class="form-control" name="idcliente" value="{{$cliente->id}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="@if(count($errors) > 0){{old("nome")}}@else{{$cliente->nome}}@endif">
                    @error('nome')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="datanasc" class="col-sm-6 col-form-label">Data de Nascimento</label>
                <div class="col-sm-6">
                    <input id="datanasc" type="date" class="form-control @error('datanasc') is-invalid @enderror" name="datanasc" value="@if(count($errors) > 0){{old("datanasc")}}@else{{$cliente->datanasc}}@endif">
                    @error('datanasc')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
                <div class="col-sm-10">
                    <input id="cpf" type="text" class="form-control" name="cpf" value="{{$cliente->cpf}}" readonly>
                    @error('cpf')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
            </div>
            <fieldset class="form-group @error('modcredito') is-invalid @enderror">
                <div class="row">
                    <legend class="col-form-label col-sm-6 pt-0">Compras no vale</legend>
                    <div class="col-sm-6">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="form-check-input radio" type="radio" id="modcreditotrue" name="modcredito" value="{{true}}" @if(count($errors) > 0){{ (old("modcredito") == true ? "checked":"")}}@else{{ ($cliente->modcredito == true ? "checked":"") }}@endif>
                            <label class="form-check-label" for="modcreditotrue">SIM</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input  class="form-check-input radio" type="radio" id="modcreditofalse" name="modcredito" value="{{0}}" @if(count($errors) > 0){{ (old("modcredito") == false ? "checked":"")}}@else{{ ($cliente->modcredito == false ? "checked":"") }}@endif>
                            <label class="form-check-label" for="modcreditofalse">NÃO</label>
                        </div>
                    </div>
                    @error('modcredito')
                    <div class="row">
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    </div>
                    @enderror
                </div>
            </fieldset>
            <fieldset class="form-group @error('status') is-invalid @enderror">
                <div class="row">
                    <legend class="col-form-label col-sm-6 pt-0">Ativo</legend>
                    <div class="col-sm-6">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="form-check-input radio" type="radio" id="statustrue" name="status" value="{{true}}" @if(count($errors) > 0){{ (old("status") == true ? "checked":"")}}@else{{ ($cliente->status == true ? "checked":"") }}@endif>
                            <label class="form-check-label" for="statustrue">SIM</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input  class="form-check-input radio" type="radio" id="statusfalse" name="status" value="{{0}}" @if(count($errors) > 0){{ (old("status") == false ? "checked":"")}}@else{{ ($cliente->status == false ? "checked":"") }}@endif>
                            <label class="form-check-label" for="statusfalse">NÃO</label>
                        </div>
                    </div>
                    @error('status')
                    <div class="row">
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    </div>
                    @enderror
                </div>
            </fieldset>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btnform">Atualizar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
