<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SISVendas PDV</title>
    </head>
    <body>
        <h1>Operação de Venda - Itens</h1>
        <div>
            <a href="/sisvendaspdvitens/cancelar">Cancelar</a>
            <a href="/sisvendaspdvpagamento">Pagamento</a>
        </div>

        <div>
            <span>Produtos em estoque</span>
            <table>
                <tr>
                    <th>cod. produto</th>
                    <th>nome</th>
                    <th>estoque</th>
                    <th>preco</th>
                </tr>
                @foreach($produtos as $produto)
                <tr>
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->estoque}}</td>
                    <td>{{$produto->preco}}</td>
                </tr>
                @endforeach
            </table>
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
                            <td>{{$iten['codproduto']}}</td>
                            <td>{{$iten['nomeproduto']}}</td>
                            <td>{{$iten['qtd']}}</td>
                            <td>{{$iten['precofinal']}}</td>
                            <td>{{$iten['subtotal']}}</td>
                        </tr>
                    @endforeach
                @endif


            </table>

            <div align="center">
                <form action="/sisvendaspdvitens/adicionar" method="post">
                    {{csrf_field()}}
                    Cod. Produto: <input type="text" name="codproduto"/>
                    Nome do Produto: <input type="text" name="nomeproduto"/>
                    Quantidade: <input type="text" name="qtd"/>
                    Preco Final: <input type="text" name="precofinal"/>
                    <input type="submit" value="Adicionar"/>
                </form>
            </div>

        </div>

    </body>
</html>
