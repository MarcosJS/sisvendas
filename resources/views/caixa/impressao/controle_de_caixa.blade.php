@extends('layouts.impressao')

@section('conteudo')

    <div class="row">

        <table style="width: 100%; border: 1px solid black">
            <tr>
                <th bgcolor="#7fffd4" style="width: 5%;">Cod.</th>
                <th style="width: 10%;" class="text_center">Data</th>
                <th bgcolor="#7fffd4" style="width: 10%;" class="text_center">Hora</th>
                <th class="text_center">Tipo</th>
                <th bgcolor="#7fffd4" style="width: 15%;" class="text_left">Categoria</th>
                <th class="text_left" style="width: 22.5%;">Observação</th>
                <th bgcolor="#7fffd4" class="text_right">Valor</th>
                <th class="text_center">Pagamento</th>
            </tr>

            @foreach($grupo as $movimento)

                <tr>
                    <td>{{$movimento->id}}</td>
                    <td bgcolor="#7fffd4" class="text_center">{{date('d/m/Y', strtotime($movimento->dt_movimento))}}</td>
                    <td class="text_center">{{$movimento->hr_movimento}}</td>
                    <td bgcolor="#7fffd4" class="text_center">{{$movimento->tipoMovCaixa->nome}}</td>
                    <td class="text_left">{{$movimento->catMovCaixa->nome}}</td>
                    <td bgcolor="#7fffd4" class="" class="text_left">@if($movimento->observacao != null) {{substr($movimento->observacao, 0, 25)}} @else Inexistente @endif</td>
                    <td class="text_right">{{number_format($movimento->valor,2, ',', '.')}}</td>
                    <td bgcolor="#7fffd4" class="text_center">@if($movimento->pagamento != null) {{$movimento->pagamento->tipoPagamento->nome}} @else Inexistente @endif</td>
                </tr>
                @endforeach
        </table>
    </div>
@endsection
