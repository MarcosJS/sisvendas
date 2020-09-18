<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
        <title>SISVendas</title>
    </head>
    <body>
        <div class="cabecalho">
            <header>
                <h1>Bem vindo ao SISVendas</h1>
            </header>
        </div>

        <div class="principal">
            <div class="menu">
                <nav>
                    <div>
                        <ul>
                            <li><a href="/usuarios">Usuarios</a></li>
                            <li><a href="/clientes">Clientes</a></li>
                            <li><a href="/produtos">Produtos</a></li>
                            <li><a href="/sisvendaspdv">SISVendas PDV</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="conteudo">
                <span>conteudo</span>
            </div>
        </div>

        <div class="rodape">
            <footer><span>rodape</span></footer>
        </div>

        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>
