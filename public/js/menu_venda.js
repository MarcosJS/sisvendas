var inicioVendas = document.getElementById('iniciovendas'),
    telaConsultarVendas = document.getElementById('telaconsultarvendas'),
    telaitens = document.getElementById('telaitens'),
    telapagamento = document.getElementById('telapagamento'),
    telavalidacao = document.getElementById('telavalidacao'),
    validadeVenda = document.getElementById('validadevenda');

if (validadeVenda != null && validadeVenda.value) {
    var btnf = document.getElementById('btnfinalizar');
    btnf.classList.remove('disabled');
}

if (inicioVendas) {
    var btn = document.getElementById('btniniciovendas');
    btn.classList.add('btnformout-active');
}

if (telaConsultarVendas) {
    btn = document.getElementById('btnconsultarvendas');
    btn.classList.add('btnformout-active');
}

if (telaitens) {
    btn = document.getElementById('btnitens');
    btn.classList.add('btnformout-active');
}

if (telapagamento) {
    btn = document.getElementById('btnpagamento');
    btn.classList.add('btnformout-active');
}

if (telavalidacao) {
    btn = document.getElementById('btnvalidacao');
    btn.classList.add('btnformout-active');
}


