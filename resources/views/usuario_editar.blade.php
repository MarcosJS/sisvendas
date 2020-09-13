<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SISVendas</title>
    </head>
    <body>
        <div>
            <a href="/">Início</a>
            <a href="/usuarios">Usuarios</a>
            <a href="/clientes">Clientes</a>
            <a href="/produtos">Produtos</a>
        </div>
        <div>
            <form action="/usuarios/atualizar/{{$usuario->id}}" method="post">
                {{csrf_field()}}
                Nome: <input type="text" name="nome" value="{{$usuario->nome}}"/>
                E-mail: <input type="text" name="email" value="{{$usuario->email}}"/>
                Funcao: <input type="text" name="funcao" value="{{$usuario->funcao}}"/>
                <input type="submit" value="adicionar"/>
            </form>
        </div>
    </body>
</html>
