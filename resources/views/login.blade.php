@extends('layouts.master')

@section('titulo', 'SISVendas')

@section('conteudo')
    <div class="row justify-content-center p-5">
        <form action="/logar" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>ID do Usuário</label>
                <input type="text" class="form-control" name="usuario_id">
                <small class="form-text text-muted">Digite o numero de ID do usuário para logar.</small>
            </div>

            <button type="submit" class="btn btnform">Submit</button>
        </form>
    </div>

@endsection
