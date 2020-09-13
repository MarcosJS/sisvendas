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

            <h1>Produtos</h1>
            <a href="/produtos/novo">Novo</a>
            <table id="tabela">
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Estoque</th>
                    <th>Preço</th>
                </tr>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->descricao}}</td>
                        <td>{{$produto->estoque}}</td>
                        <td>{{$produto->preco}}</td>
                        <td><a href="/produtos/editar/{{$produto->id}}">Editar</a></td>
                        <td><a href="/produtos/remover/{{$produto->id}}">Excluir</a></td>
                    </tr>
                @endforeach
            </table>

            </ul>

        </div>
    </body>
</html>
