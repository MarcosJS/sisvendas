@extends('layouts.master')

@section('titulo', 'Cadastro de Usuário')

@section('submenu')
    @include('usuarios.menu_usuarios')
@endsection

@section('conteudo')
    <div class="p-3">
        <h1>Novo Usuario</h1>

            <form action="{{route('adicionarusuario')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{old('nome')}}">
                            @error('nome')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{old('cpf')}}">
                            @error('cpf')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Função</label>
                            <select class="custom-select @error('funcao') is-invalid @enderror" name="funcao">
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

                        <div class="form-group">
                            <label>Matrícula</label>
                            <input type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{old('matricula')}}">
                            @error('matricula')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                            @error('email')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}">
                            @error('password')
                            <span>
                                <small class="text-danger">{{$message}}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirmar Senha</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" value="{{old('password')}}">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btnform">Cadastrar</button>
            </form>

    </div>
@endsection
