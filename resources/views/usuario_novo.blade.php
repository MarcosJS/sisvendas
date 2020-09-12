<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SISVendas</title>
    </head>
    <body>
        <div>
            <a href="/usuarios">Usuarios</a>
            <a href="/">Início</a>
        </div>
        <div>
            <br>
            <form action="/usuarios/adicionar" method="post">
                {{csrf_field()}}
                Nome: <input type="text" name="nome"/><br>
                E-mail: <input type="text" name="email"/><br>
                Senha: <input type="text" name="senha"/><br>
                CPF: <input type="text" name="cpf"/><br>
                Matricula: <input type="text" name="matricula"/><br>
                Funcao: <input type="text" name="funcao"/><br>
                <input type="submit" value="adicionar"/>
            </form>
        </div>
    </body>
</html>
