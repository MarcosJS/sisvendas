@extends('layouts.master')

@section('titulo')
    @yield('titulo')
@endsection

@section('submenu')
    @include('menu_pdv')
@endsection

@section('conteudo')
    <div class="container p-3">
        @yield('titulo_conteudo')
        @include('venda.venda_menu_op')
        @yield('conteudo_view')
    </div>
@endsection
