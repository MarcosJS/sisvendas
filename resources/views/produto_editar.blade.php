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
            <form action="/produtos/atualizar/{{$produto->id}}" method="post">
                {{csrf_field()}}
                Nome: <input type="text" name="nome" value="{{$produto->nome}}"/>
                Descrição: <input type="text" name="descricao" value="{{$produto->descricao}}"/>
                Estoque: <input type="text" name="estoque" value="{{$produto->estoque}}"/>
                Preço: <input type="text" name="preco" value="{{$produto->preco}}"/>
                <input type="submit" value="adicionar"/>
            </form>
        </div>
    </body>
</html>
