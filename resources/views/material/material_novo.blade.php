@extends('layouts.painel_material')

@section('titulo', 'Cadastramento de um novo material na produção')

@section('titulo_conteudo')
    <div id="telanovormaterial" class="row">
        <h4>Material</h4>
    </div>
@endsection

@section('conteudo_modulo')
    <div class="row justify-content-sm-center mt-3 p-3">

        <form action="{{route('adicionarmaterial')}}" method="post">
            {{csrf_field()}}

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="nome">Nome</label>
                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{old("nome")}}">
                    @error('nome')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <label for="estoque">Estoque</label>
                    <input id="estoque" type="text" class="form-control @error('estoque') is-invalid @enderror" name="estoque" value="{{old('estoque')}}">
                    @error('estoque')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-sm-12">
                    <label for="descricao">Descrição</label>
                    <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{old("descricao")}}">
                    @error('descricao')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>

            </div>

            <div class="form-group row justify-content-sm-center">
                <div>
                    <button type="submit" class="btn btnform">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
