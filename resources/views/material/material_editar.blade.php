@extends('layouts.painel_material')

@section('titulo', 'Edição do Material')

@section('titulo_conteudo')
    <div id="telaeditarmaterial" class="row">
        <h4>Material</h4>
    </div>
@endsection

@section('conteudo_modulo')
    <div class="row mt-3 justify-content-sm-center p-3">

        <form action="{{route('atualizarmaterial', $material->id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" class="form-control @error('nome') is-invalid @enderror" name="nome" value="@if(count($errors) > 0){{old('nome')}}@else{{$material->nome}}@endif">
                @error('nome')
                <span>
                    <small class="text-danger">{{$message}}</small>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="@if(count($errors) > 0){{old('descricao')}}@else{{$material->descricao}}@endif">
                @error('descricao')
                <span>
                    <small class="text-danger">{{$message}}</small>
                </span>
                @enderror
            </div>

            <div class="form-row justify-content-sm-center">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
    </div>
@endsection
