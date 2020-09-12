<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SISVendas</title>
    </head>
    <body>
        Saida: {{$usuario ?? 'nada'}}
    </body>
</html>
