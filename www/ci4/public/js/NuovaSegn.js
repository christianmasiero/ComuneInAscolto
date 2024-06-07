var map;
var markerComune = null; // Inizializza la variabile marker a null
var markerUser = null; // Inizializza la variabile marker a null
var markerAddedComune = false; // Variabile per tenere traccia dello stato del marcatore
var markerAddedUser = false; // Variabile per tenere traccia dello stato del marcatore
var coordinateSelezionate;
//var comuniLayer = L.layerGroup();

function initMap() {
    // Inizializza la mappa
    map = L.map('map').setView([45.4952, 12.0576], 13); // Imposta la posizione iniziale e lo zoom

    // Aggiungi un layer della mappa da OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Funzione per gestire il clic sulla mappa
    async function onMapClick(e) {
        // Mostra un messaggio con le coordinate del punto selezionato
        console.log("Hai selezionato la posizione: " + e.latlng);
        // Invia una richiesta al controller per inserire le coordinate nel database
        coordinateSelezionate = e.latlng;
    
        // Verifica se il marcatore è già stato aggiunto
        if (markerAddedUser) {
            map.removeLayer(markerUser); // Rimuovi il marcatore dalla mappa
        }
    
        // Aggiungi un marcatore alla posizione del clic
        markerUser = L.marker(e.latlng).addTo(map);
        markerAddedUser = true; // Imposta il flag a true per indicare che il marcatore è stato aggiunto
    
        // Trova il comune corrispondente alle coordinate selezionate
        try {
            let comune = await trovaComune(coordinateSelezionate.lat, coordinateSelezionate.lng);
            document.getElementById('searchInput').value = comune;
        } catch (error) {
            console.error('Errore durante la ricerca del comune:', error);
            // Gestisci l'errore se necessario
        }
    }
    

    // Aggiungi un'azione per gestire il clic sulla mappa
    map.on('click', onMapClick);
}

// Chiama la funzione di inizializzazione della mappa quando il documento è pronto
document.addEventListener('DOMContentLoaded', initMap);


function inviaNuovaSegnalazione() {
    if (coordinateSelezionate) {
        var latitude = coordinateSelezionate.lat;
        var longitude = coordinateSelezionate.lng;

        var titolo = document.getElementById('titolo').value;
        var email = document.getElementById('email').value;
        var telefono = document.getElementById('telefono').value;
        var notifica = document.getElementById('notifica').value;
        var messaggio = document.getElementById('messaggio').value;
        var files = document.getElementById('allegato').files;

        var formData = new FormData();
        var csrfToken = '<?php echo csrf_hash(); ?>';
        formData.append('<?php echo csrf_token(); ?>', csrfToken);

        formData.append('coordinatalat', latitude);
        formData.append('coordinatalon', longitude);
        formData.append('titolo', titolo);
        formData.append('email', email);
        formData.append('telefono', telefono);
        formData.append('notifica', notifica);
        formData.append('messaggio', messaggio);

        for (var i = 0; i < files.length; i++) {
            formData.append('allegati[]', files[i]);
        }

        $.ajax({
            type: 'POST',
            url: 'creaSegn',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                window.location.href = "redirect";
            },
            error: function(xhr, status, error) {
                alert("Errore durante l'invio del modulo");
            }
        });
    } else {
        alert('Seleziona una posizione sulla mappa prima di inviare il modulo');
    }
}




// Chiama la funzione di inizializzazione della mappa quando il documento è pronto
document.addEventListener('DOMContentLoaded', initMap);

var markerComune = null; // Dichiarare il marker del comune come variabile globale

function visualizzaComune(comune) {
    // Eseguire una richiesta di geocoding a Nominatim
    fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + comune + ', Italy')
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                // Prendi le coordinate del primo risultato
                var lat = parseFloat(data[0].lat);
                var lon = parseFloat(data[0].lon);

                if (markerComune) {
                    // Se esiste già un marker del comune, aggiorna solo la posizione
                    markerComune.setLatLng([lat, lon]);
                    markerComune.bindPopup(comune).openPopup(); // Aggiorna il popup con il nome del nuovo comune
                } else {
                    // Se non esiste ancora un marker del comune, crea uno nuovo con un'icona rossa
                    markerComune = L.marker([lat, lon]).addTo(map).bindPopup(comune).openPopup();
                }

                // Centra la mappa sul comune solo se la mappa non è già centrata su un'altra posizione
                if (!map.getBounds().contains([lat, lon])) {
                    map.setView([lat, lon], 10);
                }
            } else {
                console.error('Comune non trovato');
            }
        })
        .catch(error => {
            console.error('Errore durante la richiesta di geocoding:', error);
        });
}

async function trovaComune(lat, lon) {
    try {
        const response = await fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json&zoom=10&addressdetails=1`);
        const data = await response.json();

        let comune = '';

        // Estrai informazioni sull'indirizzo
        const address = data.address;

        if (address) {
            // Estrai il nome del comune
            comune = address.city || address.town || address.village || address.county || '';
        }

        // Stampa i risultati

        return comune; // Restituisce direttamente il nome del comune
    } catch (error) {
        console.error('Errore durante la ricerca del comune:', error);
        return ''; // In caso di errore, restituisci una stringa vuota
    }
}
