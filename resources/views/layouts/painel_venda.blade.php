@extends('layouts.master')

@section('titulo')
    @yield('titulo')
@endsection

@section('submenu')
    @include('menu_usuario')
@endsection

@section('conteudo')
    <div id="painelvendas" class="container p-3">
        @yield('titulo_conteudo')
        @yield('conteudo_view')
    </div>
@endsection
