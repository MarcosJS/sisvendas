@extends('layouts.painel_colaborador')

@section('titulo', 'Novo Colaborador')

@section('titulo_conteudo')
    <div id="telanovocolaborador" class="row">
        <h4>Cadastro de Colaborador</h4>
    </div>
@endsection

@section('conteudo_modulo')
    @include('colaboradores._errors')
    <div class="row mt-3 justify-content-center">

        <form action="{{route('adicionarcolaborador')}}" method="post">
            {{csrf_field()}}
            <div class="border border-success rounded p-1">
                <h5 class="text-secondary">Dados Pessoais</h5>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome</label>
                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{old('nome')}}">
                        @error('nome')
                        <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{old('cpf')}}">
                        @error('cpf')
                        <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="dtnascimento">Data de Nascimento</label>
                        <input id="dtnascimento" type="date" class="form-control @error('dtnascimento') is-invalid @enderror" name="dtnascimento" value="{{old('dtnascimento')}}">
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
                        <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{old('matricula')}}">
                        @error('matricula')
                        <span>
                            <small class="text-danger">{{$message}}</small>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="funcao">Função</label>
                        <select id="funcao" class="custom-select @error('funcao') is-invalid @enderror" name="funcao">
                            <option value="" {{ (old("funcao") == "" ? "selected":"") }}>Default select</option>
                            @foreach($funcoes as $funcao)
                                <option value="{{$funcao->id}}" {{ (old("funcao") == $funcao->id ? "selected":"") }}>{{$funcao->nomefuncao}}</option>
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
                        <input id="salario" type="text" class="form-control @error('salario') is-invalid @enderror" name="salario" value="{{old('salario')}}">
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
                        <input id="logradouro" type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" value="{{old('logradouro')}}">
                        @error('logradouro')
                        <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="bairro">Bairro</label>
                        <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{old('bairro')}}">
                        @error('bairro')
                        <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cidade">Cidade</label>
                        <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="{{old('cidade')}}">
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
                    <div class="form-group col-md-3">
                        <label for="telefone">Telefone</label>
                        <input id="telefone" type="text" class="form-control @error('numerotel') is-invalid @enderror" name="numerotel" value="{{old('numerotel')}}">
                        @error('numerotel')
                        <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-row justify-content-sm-center mt-3">
                <button type="submit" class="btn btnform">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection

