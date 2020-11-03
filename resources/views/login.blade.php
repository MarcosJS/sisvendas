@extends('layouts.master')

@section('titulo', 'SISVendas - Login')

@section('conteudo')
    <div class="container p-3">
        <div class="row justify-content-center p-5 @error('dadosnaoconferem') is-invalid @enderror">
        <form action="{{route('logar')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" placeholder="00011122233" name="cpf" value="{{old('cpf')}}">
                    @error('cpf')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="admin1234" name="password">
                    @error('password')
                    <span>
                        <small class="text-danger">{{$message}}</small>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="col btn btnform">Logar</button>
            </form>

        <!--<form action="{{route('logar')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>ID do Usuário</label>
                    <input type="text" class="form-control" name="usuario_id">
                    <small class="form-text text-muted">Digite o numero de ID do usuário para logar.</small>
                </div>

                <button type="submit" class="btn btnform">Logar</button>
            </form>-->
        </div>
        @error('dadosnaoconferem')
        <div class="alert alert-danger alert-dismissible fade show row" role="alert">
            <strong>Dados não conferem! </strong> {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @enderror
    </div>
@endsection
