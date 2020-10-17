@extends('layouts.master')

@section('titulo', 'Cadastro de Cliente')

@section('submenu')
    @include('clientes.menu_clientes')
@endsection

@section('conteudo')
    <div class="p-3">
        <h1>Novo Cliente</h1>
        <form action="{{route('adicionarcliente')}}" method="post">
            {{csrf_field()}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{old('nome')}}">
                    @error('nome')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label>CPF</label>
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{old('cpf')}}">
                    @error('cpf')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control @error('datanasc') is-invalid @enderror" name="datanasc" value="{{old('datanasc')}}">
                    @error('datanasc')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Logradouro</label>
                    <input type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" value="{{old('logradouro')}}">
                    @error('logradouro')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label>Bairro</label>
                    <input type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{old('bairro')}}">
                    @error('bairro')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label>Cidade</label>
                    <input type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="{{old('cidade')}}">
                    @error('cidade')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Telefone</label>
                    <input type="text" class="form-control @error('numerotel') is-invalid @enderror" name="numerotel" value="{{old('numerotel')}}">
                    @error('numerotel')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btnform">Cadastrar</button>
        </form>
    </div>
@endsection
