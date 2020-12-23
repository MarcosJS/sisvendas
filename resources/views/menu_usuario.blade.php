<li class="nav-item dropdown">
    @php
        $textColor = 'text-white';
        if (auth()->check() && auth()->user()->funcao->nivel == 2) {
            $textColor = 'text-success';
        }
    @endphp
    @if(auth()->check())
        <a class="nav-link dropdown-toggle border rounded {{$textColor}}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>{{auth()->user()->nome}}</span>
        </a>
        <div id="drop-menu" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('usuario', auth()->user()->id)}}">Perfil</a>
            <a id="btnapagardadosoperacao" class="dropdown-item" href="{{route('apagardadossecaovenda')}}">Apagar dados de operação de Venda</a>
            <a id="btnsair" class="dropdown-item" href="{{route('deslogar')}}">Sair</a>
        </div>
    @endif
</li>
