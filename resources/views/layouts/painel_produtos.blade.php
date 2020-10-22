@extends('layouts.master')

@section('titulo')
    @yield('titulo')
@endsection

@section('conteudo')
    <div class="container p-3">
        @yield('titulo_conteudo')
        @include('produto.produtos_menu_painel')
        @yield('conteudo_modulo')
    </div>
@endsection
