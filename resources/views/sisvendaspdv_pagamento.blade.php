<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SISVendas PDV</title>
    </head>
    <body>
        <h1>Operação de Venda - Pagamento</h1>
        <div>
            <a href="/sisvendaspdvitens">Voltar</a>
            <a href="/sisvendaspdvpagamento/cancelar">Cancelar</a>
        </div>

        <div>
            <br><br><span>Clientes cadastrados</span>
            <table>
                <tr>
                    <th>id</th>
                    <th>nome</th>
                </tr>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->id}}</td>
                        <td>{{$cliente->nome}}</td>
                    </tr>
                @endforeach
            </table>
            <a href="/clientes/novo">novo cliente</a>

            br><br><span>Usuarios cadastrados</span>
            <table>
                <tr>
                    <th>id</th>
                    <th>nome</th>
                </tr>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->nome}}</td>
                    </tr>
                @endforeach
            </table>
            <a href="/usuarios/novo">novo usuario</a>
        </div>

        <div>
            <table align="center">
                <tr>
                    <th>Cod. Produto</th>
                    <th>Nome do Produto</th>
                    <th>Quant</th>
                    <th>Preco Final</th>
                    <th>Subtotal</th>
                </tr>

                @if(count($itens) > 0)
                    @foreach($itens as $iten)
                        <tr>
                            <td>{{$iten[0]}}</td>
                            <td>{{$iten[1]}}</td>
                            <td>{{$iten[2]}}</td>
                            <td>{{$iten[3]}}</td>
                            <td>{{$iten[4]}}</td>
                        </tr>
                    @endforeach
                @endif


            </table>

            <div align="center">
                <form action="/sisvendaspdvrevisao" method="post">
                    {{csrf_field()}}
                    <br><br><label>Dados do Cliente</label>
                    <table>
                        <tr><td>Id Cliente: </td><td><input type="text" name="idcliente"/></td></tr>
                        <tr><td>Nome do Cliente: </td><td><input type="text" name="nomecliente"/></td></tr>
                    </table>
                    <br><br><label>Dados do Ususario</label>
                    <table>
                        <tr><td>Id Usuario: </td><td><input type="text" name="idusuario"/></td></tr>
                        <tr><td>Nome do Usuario: </td><td><input type="text" name="nomeusuario"/></td></tr>
                    </table>
                    <br><br><label>Escolha o Metodo de Pagamento</label>
                    <table>
                        <tr><td>Metodo de Pagamento: </td><td><input type="text" name="metodopg"/></td></tr>
                    </table>

                    <br><input type="submit" value="Revisar e Confirmar"/>
                </form>
            </div>

        </div>

    </body>
</html>
