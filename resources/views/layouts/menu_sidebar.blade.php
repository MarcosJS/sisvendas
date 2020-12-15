<div class="list-group list-group-flush">
    @if(auth()->check())
        <a id="menu_vendas" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#sub_menu_vendas">
            <strong>PDV</strong>
            <span class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </span>
        </a>
        @include('venda.venda_menu_painel')

        <a class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#sub_menu_caixa">
            <strong>Financeiro</strong>
            <span class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </span>
        </a>
        @include('financeiro.caixa_submenu')

        <a class="list-group-item list-group-item-action" href="{{route('clientes')}}">
            <strong>Clientes</strong>
        </a>

        <a id="menu_produtos" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#sub_menu_produtos" href="#">
            <strong>Produtos</strong>
            <span class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </span>
        </a>
        @include('produto.produtos_menu_painel')

        <a id="menu_material" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#sub_menu_material" href="#">
            <strong>Matéria Prima</strong>
            <span class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </span>
        </a>
        @include('material.material_submenu')

        @if(auth()->user()->funcao->nivel === 2)
            <a class="list-group-item list-group-item-action" href="{{route('usuarios')}}"><strong>Usuarios</strong></a>
        @endif
    @endif
    <a class="list-group-item list-group-item-action" href="#"><strong>Contato</strong></a>
</div>
