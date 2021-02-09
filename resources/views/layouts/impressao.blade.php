<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .text_right {
            text-align: right;
        }
        .text_center {
            text-align: center;
        }
        .text_left {
            text-align: left;
        }

        .td_vendas {
            width: 22%;
        }

    </style>
</head>
<body>

    <div id="content" class="container">
        @yield('conteudo')
    </div>
    {{--<div>
        @yield('numpagina')
    </div>--}}

<!--<script src="{{asset('js/app.js')}}" type="text/javascript"></script>-->
</body>
</html>
