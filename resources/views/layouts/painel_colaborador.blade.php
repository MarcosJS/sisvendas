@extends('layouts.master')

@section('titulo')
@yield('titulo')
@endsection

@section('conteudo')
<div id="painelcolaborador" class="container p-3">
    @yield('titulo_conteudo')

    @yield('conteudo_modulo')
</div>
@endsection
