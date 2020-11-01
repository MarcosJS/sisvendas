@extends('layouts.master')

@section('titulo')
    @yield('titulo')
@endsection

@section('submenu')
    @include('menu_usuario')
@endsection

@section('conteudo')
    <div id="operacaovenda" class="container p-3">
        @yield('titulo_conteudo')
        @include('venda.venda_menu_op')
        @yield('conteudo_view')
    </div>
@endsection
