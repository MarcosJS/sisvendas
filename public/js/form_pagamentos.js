var metodopg = document.getElementById('metodopg');
var btncancel = document.getElementById('btncancel');

if(metodopg) {
    metodopg.addEventListener('change', function () {
        if(this.value === '1') {
            document.getElementById('formcheque').hidden = false;
        }
    })
}

if(btncancel) {
    btncancel.addEventListener('click', function () {
        metodopg.selectedIndex = 0;
        document.getElementById('formcheque').hidden = true;
    })
}
