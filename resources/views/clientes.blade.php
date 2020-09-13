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

            <h1>Clientes</h1>
            <a href="/clientes/novo">Novo</a>
            <table id="tabela">
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>CPF</th>
                    <th>Credito Abilitado</th>
                    <th>Status</th>
                    <th>Endereco</th>
                    <th>Telefone</th>
                </tr>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->nome}}</td>
                        <td>{{$cliente->datanasc}}</td>
                        <td>{{$cliente->cpf}}</td>
                        <td>{{$cliente->modcredito}}</td>
                        <td>{{$cliente->status}}</td>
                        <td>{{$cliente->status}}</td>
                        <td>{{$cliente->status}}</td>
                        <td><a href="/clientes/editar/{{$cliente->id}}">Editar</a></td>
                        <td><a href="/clientes/remover/{{$cliente->id}}">Excluir</a></td>
                    </tr>
                @endforeach
            </table>

            </ul>

        </div>
    </body>
</html>
