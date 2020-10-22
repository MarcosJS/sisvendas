@extends('layouts.master')

@section('titulo', 'SISVendas')

@section('conteudo')
    <div class="container p-3">
        <div class="row justify-content-center p-5">
            <form action="{{route('logar')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" placeholder="Entre como CPF" name="cpf">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
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
    </div>
@endsection
