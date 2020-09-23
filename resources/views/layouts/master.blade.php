<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{asset('css/div.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
        <title>@yield('titulo')</title>
    </head>
    <body>

        <div id="wrapper" class="d-flex">

            <div id="sidebar-wrapper" class="border-right">

                <div class="sidebar-heading"><a class="navbar-brand" href="/">SISVendas</a></div>

                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action" href="#">SISVendas PDV - Em construção</a>
                    <a class="list-group-item list-group-item-action" href="/usuarios">Usuarios</a>
                    <a class="list-group-item list-group-item-action" href="#">Clientes - Em construção</a>
                    <a class="list-group-item list-group-item-action" href="#">Produtos - Em construção</a>
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
                            <li class="nav-item">
                                <a class="nav-link" href="/">Início</a>
                            </li>
                            @yield('submenu')
                        </ul>
                    </div>
                </nav>

                <div class="container-fluid">
                    @yield('conteudo')
                </div>

            </div>

        </div>


        <!--<footer class="rodape mb-0" style="background-color: #385d7a">
            <span>rodape</span>
        </footer>-->

        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>
