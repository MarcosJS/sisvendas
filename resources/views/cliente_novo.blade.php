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
            <form action="/clientes/adicionar" method="post">
                {{csrf_field()}}
                Nome: <input type="text" name="nome"/><br>
                Data de Nascimento: <input type="date" name="datanasc"/><br>
                CPF: <input type="text" name="cpf"/><br>
                Logradouro: <input type="text" name="logradouro"/><br>
                Bairro: <input type="text" name="bairro"/><br>
                Cidade: <input type="text" name="cidade"/><br>
                Telefone: <input type="tel" name="numerotel"/><br>
                <input type="submit" value="adicionar"/>
            </form>
        </div>
    </body>
</html>
