<tr>
    <td>{{$pag->valor}}</td>
    <td>{{$pag->tipo}}</td>
    <td>{{date('d/m/yy', strtotime($pag->dtpagamento))}}</td>
    <td class="text-center"><a class="badge-info badge" href="#">Acessar</a></td>
    <td class="text-center"><a class="badge-danger badge" href="{{route('excluirpagamento', $pag->id)}}">Excluir</a></td>
</tr>
