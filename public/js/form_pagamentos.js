var metodopg = document.getElementById('metodopg'),
    btncancel = document.getElementById('btncancel'),
    camposValor = document.getElementsByClassName('valor'),
    totalliq = document.getElementById('totalliq'),
    cliente = document.getElementById('cliente'),
    closeCliente = document.getElementById('closelistclientes'),
    clientePesq = document.getElementById("clientepesq"),
    removerCliente = document.getElementById('removercliente');

tabelaUsuarios = document.getElementsByClassName("listaclientes");
for(linha in tabelaUsuarios) {
    tabelaUsuarios[linha].onmousemove = function() {
        this.style.cursor = 'pointer';
    };
    tabelaUsuarios[linha].onclick = function() {
        location.href='vincularcliente/'+this.firstElementChild.innerHTML;
    }
}

window.onload = function () {
    if(metodopg ) {
        carregarFormPagamento();
        metodopg.onchange = function () {carregarFormPagamento()};
    }};

if(btncancel) {
    btncancel.addEventListener('click', function () {
        metodopg.selectedIndex = 0;
        document.getElementById('formcheque').hidden = true;
    })
}

if(cliente) {
    cliente.addEventListener('click', function () {
        document.getElementById('listaclientes').hidden = false;
    });
}

if(closeCliente) {
    closeCliente.addEventListener('click', function () {
        document.getElementById('listaclientes').hidden = true;
    })
}

if(clientePesq) {
    clientePesq.onkeyup = function (){filtrarLista()};
}

if(removerCliente) {
    removerCliente.addEventListener('click', function () {
        location.href='desvincularcliente/';
    })
}

function carregarFormPagamento() {
    switch (metodopg.value) {
        case '1':
            document.getElementById('formcheque').hidden = false;
            for (let item of camposValor) {
                item.value = totalliq.innerText;
            }
            break;
        default:
            console.log('o valor em default: '+metodopg.value);
            break;
    }
}

function filtrarLista() {

    var filtro, table, tr, tds, i, conteudo1, conteudo2, conteudo3;
    filtro = clientePesq.value.toUpperCase();
    table = document.getElementById("tabelaclientes");
    tr = table.getElementsByTagName('tr');

    for (i = 1; i < tr.length; i++) {
        tds = tr[i].getElementsByTagName('td')/*[0]*/;
        if (tds) {
            conteudo1 = tds[0].textContent || tds[0].innerText;
            conteudo1 = conteudo1.toUpperCase().indexOf(filtro) > -1;
            conteudo2 = tds[1].textContent || tds[1].innerText;
            conteudo2 = conteudo2.toUpperCase().indexOf(filtro) > -1;
            conteudo3 = tds[2].textContent || tds[2].innerText;
            conteudo3 = conteudo3.toUpperCase().indexOf(filtro) > -1;

            if (conteudo1 || conteudo2 || conteudo3) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
