<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SISVendas</title>
        <style>
            *{
                padding: 0;
                margin: 0;
            }
            body{
                position: absolute;
                width: 100%;
                height: 100%;
            }
            .cabecalho{
                height: 40px;
                background-color: #636b6f;
            }
            .principal{
                height: 90%;
            }
            .menu{
                float: left;
                width: 150px;
                height: 100%;
                background-color: #7fff00;
            }
            .conteudo{
                width: 100%;
                height: 100%;
                background-color: bisque;
            }
            .rodape{
                height: 30px;
                background-color: aqua;
            }
        </style>
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

    </body>
</html>
