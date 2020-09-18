<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SISVendas PDV</title>
    </head>
    <body>
        <h1>Operação de Venda - Revisão</h1>
        <div>
            <a href="/sisvendaspdvpagamento">Voltar</a>
            <a href="/sisvendaspdvrevisao/cancelar">Cancelar</a>
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
                <div><br><br>
                    <form action="/sisvendaspdvregistro" method="post">
                        {{csrf_field()}}
                        <table>
                            <tr><td>Id do Cliente: </td><td><input type="text" name="idcliente" value="{{$dadosvenda['idcliente']}}" readonly="true"/></td></tr>
                            <tr><td>Nome do Cliente: </td><td><input type="text" name="nomecliente" value="{{$dadosvenda['nomecliente']}}" readonly="true"></td></tr>
                            <tr><td>Id do Usuario: </td><td><input type="text" name="idusuario" value="{{$dadosvenda['idusuario']}}" readonly="true"/></td></tr>
                            <tr><td>Nome do Usuario: </td><td><input type="text" name="nomeusuario" value="{{$dadosvenda['nomeusuario']}}" readonly="true"></td></tr>
                            <tr><td>Data da Venda: </td><td><input type="text" name="dtvenda" value="{{$dadosvenda['dtvenda']}}" readonly="true"/></td></tr>
                            <tr><td>Hora da Venda: </td><td><input type="text" name="hrvenda" value="{{$dadosvenda['hrvenda']}}" readonly="true"/></td></tr>
                            <tr><td>Total dos Produtos: </td><td><input type="text" name="totalprodutos" value="{{$dadosvenda['totalprodutos']}}" readonly="true"/></td></tr>
                            <tr><td>Total Líquido: </td><td><input type="text" name="totalliq" value="{{$dadosvenda['totalliq']}}" readonly="true"/></td></tr>
                            <tr><td>Método de Pagamento: </td><td><input type="text" name="metodopg" value="{{$dadosvenda['metodopg']}}" readonly="true"/></td></tr>
                            <tr><td>Status: </td><td><input type="text" name="status" value="{{$dadosvenda['status']}}" readonly="true"/></td></tr>
                        </table>

                        <br><input type="submit" value="Concluir"/>
                    </form>
                </div>
            </div>

        </div>

    </body>
</html>
