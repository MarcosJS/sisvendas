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
            <br>
            <form action="/clientes/atualizar/{{$cliente->id}}" method="post">
                {{csrf_field()}}
                Nome: <input type="text" name="nome" value="{{$cliente->nome}}"/><br>
                Data de Nascimento: <input type="date" name="datanasc" value="{{$cliente->datanasc}}"/><br>
                CPF: <input type="text" name="cpf" value="{{$cliente->cpf}}"/><br>
                <input type="submit" value="adicionar"/>
            </form>
        </div>
    </body>
</html>
