@extends('layouts.painel_produto')

@section('titulo', 'Cadastro de Composição')

@section('titulo_conteudo')
    <div id="telanovacomposicao" class="row">
        <h4>Composição</h4>
    </div>
@endsection

@section('conteudo_modulo')
    <div class="row justify-content-sm-center">
        @include('produto._errors')
    </div>

    <div class="row justify-content-sm-center mt-3 p-3">

        <div class="col-sm-6 border rounded">
            <form action="{{route('adicionaritemcomposicao')}}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="material">Material</label>
                        <select class="@error('material') is-invalid @enderror form-control" id="material" name="material">
                            <option selected value="">Material...</option>
                            @foreach($materiais as $material)
                                <option value="{{$material->id}}">{{$material->nome}}</option>
                            @endforeach
                        </select>
                        @error('material')
                        <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="quantidade">Quantidade</label>
                        <input type="text" class=" @error('quantidade') is-invalid @enderror form-control" id="quantidade" name="quantidade" value="{{old("quantidade")}}">
                        @error('quantidade')
                        <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div>
                        <input type="hidden" name="produto" value="{{$produto->id}}">
                        <button type="submit" class="btn btn-primary">Incluir</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col border rounded">
            <table class="table table-sm table-striped">
                <tr>
                    <th>Cod.</th>
                    <th>Nome do Material</th>
                    <th>Quant</th>
                </tr>

                @if(count($itens) > 0)
                    @foreach($itens as $item)
                        <tr>
                            <td>{{$item['material']->id}}</td>
                            <td>{{$item['material']->nome}}</td>
                            <td>{{$item['quantidade']}}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
            @if(count($itens) > 0)
                <div class="row justify-content-center">
                    <a class="btn btn-outline-danger" href="{{route('limparcomposicao')}}">Limpar Composição</a>
                </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-sm-center mt-3 p-3">
        <a class="btn btnformout" href="{{route('salvarcomposicao', $produto->id)}}">Salvar Composição</a>
    </div>
@endsection
