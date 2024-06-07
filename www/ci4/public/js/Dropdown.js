document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById('searchInput');
    var searchResults = document.getElementById('searchResults');
    var timeout = null;

    // Ascolta l'evento di input sulla casella di ricerca
    searchInput.addEventListener('input', function() {
        var searchText = searchInput.value;

        // Cancella il timeout precedente
        clearTimeout(timeout);

        // Avvia un nuovo timeout
        timeout = setTimeout(function() {
            // Effettua una richiesta solo se la lunghezza del testo di ricerca è maggiore o uguale a 3
            if (searchText.length >= 3) {
                searchResults.innerHTML = '';
                // Effettua una richiesta AJAX al server per recuperare i risultati della ricerca
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/Segnalazioni/search?query=' + searchText, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Visualizza i risultati nella sezione dei risultati
                        searchResults.innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            } else {
                // Pulisci la sezione dei risultati se il testo di ricerca è inferiore a 3 caratteri
                searchResults.innerHTML = '';
            }
        }, 500); // Ritardo di 1 secondo (1000 millisecondi)
    });
});

function selectComune(comune) {
    document.getElementById('searchInput').value = comune;
    document.getElementById('searchResults').innerHTML = '';
    visualizzaComune(comune);
}