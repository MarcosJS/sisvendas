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
            <form action="/produtos/adicionar" method="post">
                {{csrf_field()}}
                Nome: <input type="text" name="nome"/><br>
                Descrição: <input type="text" name="descricao"/><br>
                Estoque: <input type="text" name="estoque"/><br>
                Preço: <input type="text" name="preco"/><br>
                <input type="submit" value="adicionar"/>
            </form>
        </div>
    </body>
</html>
