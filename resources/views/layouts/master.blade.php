<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{asset('css/div.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/master.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/form_cheque.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/btnformout.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/caixa.css')}}" rel="stylesheet" type="text/css"/>
        <title>@yield('titulo')</title>
    </head>
    <body>

        <div id="wrapper" class="d-flex">

            <div id="sidebar-wrapper" class="border-right">
                <div class="sidebar-heading"><a class="navbar-brand" href="{{route('inicio')}}"><h4>SISVendas</h4></a></div>
                @include('layouts.menu_sidebar')
            </div>

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

            <div id="page-content-wrapper">
                @yield('conteudo')
            </div>

            <footer id="footer">
                @yield('rodape')
            </footer>

        </div>

        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/venda_itens.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/venda_pagamento.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/menu_venda.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/menu_produto.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/vendas.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/caixa_suprimento.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/caixa_sangria.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/form_dinheiro.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/form_cheque.js')}}" type="text/javascript"></script>
    </body>
</html>
