@extends('layouts.master')

@section('titulo')
    @yield('titulo')
@endsection

@section('submenu')
    @include('menu_usuario')
@endsection

@section('conteudo')
    <div id="painelcaixa" class="container p-3">
        @yield('conteudo_view')
    </div>
@endsection


