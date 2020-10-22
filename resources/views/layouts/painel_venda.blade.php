@extends('layouts.master')

@section('titulo')
    @yield('titulo')
@endsection

@section('submenu')
    @include('menu_usuario')
@endsection

@section('conteudo')
    <div class="container p-3">
        @yield('titulo_conteudo')
        @include('venda.venda_menu_painel')
        @yield('conteudo_view')
    </div>
@endsection
