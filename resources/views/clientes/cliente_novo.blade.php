@extends('layouts.master')

@section('titulo', 'Cadastro de Cliente')

@section('submenu')
    @include('clientes.menu_clientes')
@endsection

@section('conteudo')
    <div class="p-3">
        <h1>Novo Cliente</h1>
        <form action="/clientes/adicionar" method="post">
            {{csrf_field()}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome">
                </div>
                <div class="form-group col-md-3">
                    <label>CPF</label>
                    <input type="text" class="form-control" name="cpf" placeholder="000.000.000-00">
                </div>
                <div class="form-group col-md-3">
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control" name="datanasc" placeholder="dd/mm/aaaa">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Logradouro</label>
                    <input type="text" class="form-control" name="logradouro">
                </div>
                <div class="form-group col-md-3">
                    <label>Bairro</label>
                    <input type="text" class="form-control" name="bairro">
                </div>
                <div class="form-group col-md-3">
                    <label>Cidade</label>
                    <input type="text" class="form-control" name="cidade">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Telefone</label>
                    <input type="text" class="form-control" name="numerotel">
                </div>
            </div>

            <button type="submit" class="btn btnform">Cadastrar</button>
        </form>
    </div>
@endsection
