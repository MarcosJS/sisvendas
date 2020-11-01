var painelVendas = document.getElementById('painelvendas'),
    inicioVendas = document.getElementById('iniciovendas'),
    telaConsultarVendas = document.getElementById('telaconsultarvendas'),
    operacaoVenda = document.getElementById('operacaovenda'),
    telaitens = document.getElementById('telaitens'),
    telapagamento = document.getElementById('telapagamento');

if (painelVendas || operacaoVenda) {
    menuVendas= document.getElementById('menu_vendas');
    subMenuVendas = document.getElementById('sub_menu_vendas');
    menuVendas.classList.add('collapsed');
    subMenuVendas.classList.add('show');
}

function destacarMenu(botao, classe) {
    btn = document.getElementById(botao);
    btn.classList.add(classe);
}

if (inicioVendas) {
    destacarMenu('btniniciovendas', 'btnformout-active');
}

if (telaConsultarVendas) {
    destacarMenu('btnconsultarvendas', 'btnformout-active');
}

if (operacaoVenda) {
    destacarMenu('btnnovavenda', 'btnformout-active');
}

if (telaitens) {
    destacarMenu('btnitens', 'btnformout-active');
}

if (telapagamento) {
    destacarMenu('btnpagamento', 'btnformout-active');
    btnf = document.getElementById('btnfinalizar');
    btnf.classList.remove('disabled');
}


