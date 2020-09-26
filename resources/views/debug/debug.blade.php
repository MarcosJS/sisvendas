<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="{{asset('css/div.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
        <title>Teste</title>
    </head>
    <body>
    @include('debug.debugclientes')
    @include('debug.debugprodutosvendaitens')
    @include('debug.debugvendas')
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>
