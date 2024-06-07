
function modificaDati() {
    var inputs = document.querySelectorAll('.modifica');
    document.getElementById('btnMod').setAttribute('hidden', 'hidden')
    inputs.forEach(function (input) {
        input.removeAttribute('disabled');
    });
    document.getElementById('btnSbm').removeAttribute('hidden')
    document.getElementById('btnDel').removeAttribute('hidden')

}

