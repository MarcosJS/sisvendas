@extends('layouts.master')

@section('titulo', 'SISVendas PDV')

@section('submenu')
    @include('menu_pdv')
@endsection

@section('conteudo')
    <div class="p-3">
        <h1>SISVendas PDV</h1>

        <a href="/vendas">Consultar todas as Vendas</a>
        <a href="/sisvendaspdvitens">Nova Operação</a>
    </div>
@endsection
