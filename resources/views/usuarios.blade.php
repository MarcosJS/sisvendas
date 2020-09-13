<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SISVendas</title>
        <style>
            #tabela {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #tabela td, #tabela th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #tabela tr:nth-child(even){background-color: #f2f2f2;}

            #tabela tr:hover {background-color: #ddd;}

            #tabela th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #a2a2a2;
                color: white;
            }
        </style>
    </head>
    <body>
        <div>
            <a href="/">Início</a>
            <a href="/usuarios">Usuarios</a>
            <a href="/clientes">Clientes</a>
            <a href="/produtos">Produtos</a>
        </div>
        <div>

            <h1>Usuarios</h1>
            <a href="/usuarios/novo">Novo</a>
            <table id="tabela">
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Matricula</th>
                    <th>Status</th>
                    <th>Função</th>
                </tr>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->nome}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->cpf}}</td>
                        <td>{{$usuario->matricula}}</td>
                        <td>{{$usuario->status}}</td>
                        <td>{{$usuario->funcao}}</td>
                        <td><a href="/usuarios/editar/{{$usuario->id}}">Editar</a></td>
                        <td><a href="/usuarios/remover/{{$usuario->id}}">Excluir</a></td>
                    </tr>
                @endforeach
            </table>

            </ul>

        </div>
    </body>
</html>
