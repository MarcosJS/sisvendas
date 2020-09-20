document.getElementById("menu-toggle").addEventListener('click', function(e) {
    e.preventDefault();
    btn = document.getElementById("wrapper");
    console.log(btn);
    btn.classList.toggle("toggled");
    console.log(btn);
});

linhatb = document.getElementsByClassName("linhatabelaclick");
for(linha in linhatb) {
    linhatb[linha].onmousemove = function() {
        this.style.cursor = 'pointer';
    };


    linhatb[linha].onclick = function() {
        location.href='/'+this.title+'/perfil/'+this.firstElementChild.innerHTML;
    }
}

btnformcad = document.getElementsByClassName('btnformcad');
if(btnformcad.length > 0) {
    btnformcad[0].addEventListener('click', function () {
        location.href='/'+btnformcad[0].id+'/novo';
    });
}

btnformedit = document.getElementsByClassName('btnformedit');
if(btnformedit.length > 0) {
    btnformedit[0].addEventListener('click', function () {
        location.href = '/'+btnformedit[0].id+'/editar/' + document.getElementById('id').innerText;
    });
}

