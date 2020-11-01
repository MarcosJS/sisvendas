<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{asset('css/div.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/form_cheque.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/btnformout.css')}}" rel="stylesheet" type="text/css"/>
        <title>@yield('titulo')</title>
    </head>
    <body>

        <div id="wrapper" class="d-flex">

            <div id="sidebar-wrapper" class="border-right">

                <div class="sidebar-heading"><a class="navbar-brand" href="{{route('inicio')}}"><h4>SISVendas</h4></a></div>

                <div class="list-group list-group-flush">
                    @if(auth()->check())
                        <a id="menu_vendas" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#sub_menu_vendas">
                            <strong>SISVendas PDV</strong>
                            <span class="float-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </span>
                        </a>
                        @include('venda.venda_menu_painel')
                        <a class="list-group-item list-group-item-action" href="{{route('clientes')}}">
                            <strong>Clientes</strong>
                        </a>
                        <a id="menu_produtos" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#sub_menu_produtos" href="#">
                            <strong>Produtos</strong>
                            <span class="float-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </span>
                        </a>
                        @include('produto.produtos_menu_painel')

                        @if(auth()->user()->funcao->nivel === 2)
                            <a class="list-group-item list-group-item-action" href="{{route('usuarios')}}"><strong>Usuarios</strong></a>
                        @endif
                    @endif
                    <a class="list-group-item list-group-item-action" href="#"><strong>Contato</strong></a>
                </div>

            </div>

            <div id="page-content-wrapper">
                <nav id="navbar-interna" class="navbar navbar-expand-lg navbar-light border-bottom">
                    <button id="menu-toggle" class="btn">Menu</button>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            @include('menu_usuario')
                        </ul>
                    </div>
                </nav>

                @yield('conteudo')

            </div>

        </div>

        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/select_itens.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/form_pagamentos.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/menu_venda.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/menu_produto.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/vendas.js')}}" type="text/javascript"></script>
    </body>
</html>
