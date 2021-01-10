@extends('layouts.painel_colaborador')

@section('titulo', 'Edição do Colaborador')

@section('titulo_conteudo')
    <div id="telaeditarcolaborador" class="row">
        <h4>Colaborador</h4>
    </div>
@endsection

@section('conteudo_modulo')
    @include('colaboradores._errors')
    <div class="row mt-3 justify-content-center">

        <form action="{{route('atualizarcolaborador', $colaborador->id)}}" method="post">
            {{csrf_field()}}
            <div class="border border-success rounded p-1">
                <h5 class="text-secondary">Dados Pessoais</h5>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome</label>
                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="@if(count($errors) > 0){{old('nome')}}@else{{$colaborador->nome}}@endif">
                        @error('nome')
                        <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="@if(count($errors) > 0){{old('cpf')}}@else{{$colaborador->cpf}}@endif" readonly>
                        @error('cpf')
                        <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="dtnascimento">Data de Nascimento</label>
                        <input id="dtnascimento" type="date" class="form-control @error('dtnascimento') is-invalid @enderror" name="dtnascimento" value="@if(count($errors) > 0){{old('dtnascimento')}}@else{{$colaborador->dtnascimento}}@endif">
                        @error('dtnascimento')
                        <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="border border-success rounded p-1 mt-3">
                <h5 class="text-secondary">Dados Funçionais</h5>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="matricula">Matrícula</label>
                        <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="@if(count($errors) > 0){{old('matricula')}}@else{{$colaborador->matricula}}@endif">
                        @error('matricula')
                        <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="funcao">Função</label>
                        <select id="funcao" class="custom-select @error('funcao') is-invalid @enderror" name="funcao">
                            <option value="" @if(old("funcao") == "" || $colaborador->funcao->id == "") selected @endif>Default select</option>
                            @foreach($funcoes as $funcao)
                                <option value="{{$funcao->id}}" @if(old("funcao") == $funcao->id || $funcao->id == $colaborador->funcao->id) selected @endif >{{$funcao->nomefuncao}}</option>
                            @endforeach
                        </select>
                        @error('funcao')
                        <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="salario">Salário</label>
                        <input id="salario" type="text" class="form-control @error('salario') is-invalid @enderror" name="salario" value="@if(count($errors) > 0){{old('salario')}}@else{{$colaborador->salario}}@endif">
                        @error('salario')
                        <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="border border-success rounded  p-1 mt-3">
                <h5 class="text-secondary">Endereço</h5>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="logradouro">Logradouro</label>
                        <input id="logradouro" type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" value="@if(count($errors) > 0){{old('logradouro')}}@else{{$endereco->logradouro}}@endif">
                        @error('logradouro')
                        <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="bairro">Bairro</label>
                        <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="@if(count($errors) > 0){{old('bairro')}}@else{{$endereco->bairro}}@endif">
                        @error('bairro')
                        <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cidade">Cidade</label>
                        <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="@if(count($errors) > 0){{old('cidade')}}@else{{$endereco->cidade}}@endif">
                        @error('cidade')
                        <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="border border-success rounded p-1 mt-3">
                <h5 class="text-secondary">Contato</h5>
                <div class="form-row">
                    @for($i=0;$i<count($telefones);$i++)
                    <div class="form-group col-md-3">
                        <label for="telefone">Telefone {{$i + 1}}</label>
                        <input id="telefone" type="text" class="form-control @error('numerotel') is-invalid @enderror" name="numerotel" value="@if(count($errors) > 0){{old('numerotel')}}@else{{$telefones[$i]->numerotel}}@endif">
                        @error('numerotel')
                        <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                        @enderror
                    </div>
                    @endfor
                </div>
            </div>

            <div class="form-row justify-content-sm-center mt-3">
                <button type="submit" class="btn btnform">Cadastrar</button>
            </div>
        </form>

    </div>
@endsection
