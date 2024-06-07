<?php

namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class ComuniModel extends Model {

    protected $table = 'gi_comuni'; // Nome della tabella nel database

    /**
     * Cerca i comuni basandosi sul testo di ricerca fornito
     * 
     * @param string $testoRicerca Testo di ricerca per il nome del comune
     * @return array Risultati della ricerca come array
     */
    public function searchComuni($testoRicerca) {
        // Esegue la query per trovare i comuni basati sul testo di ricerca
        return $this->like('nomeComune', $testoRicerca)->findAll();
    }

    /**
     * Cerca il comune più vicino alle coordinate fornite
     * 
     * @param float $latitudine Latitudine
     * @param float $longitudine Longitudine
     * @return string Nome del comune più vicino o un messaggio di errore
     */
    public function cercaComuneVicino($latitudine, $longitudine) {
        // Connessione al database
        $db = db_connect();

        // Query per trovare il comune più vicino basato sulle coordinate
        $query = "SELECT nome_comune, 
                         SQRT(POW(69.1 * (latitude - $latitudine), 2) + POW(69.1 * ($longitudine - longitude) * COS(latitude / 57.3), 2)) AS distanza
                  FROM comuni
                  ORDER BY distanza
                  LIMIT 1";

        // Esegue la query
        $risultato = $db->query($query);

        // Verifica se ci sono risultati
        if ($risultato->numRows() > 0) {
            // Ottiene il nome del comune più vicino
            $riga = $risultato->getRow();
            $comunePiuVicino = $riga->nome_comune;
            return $comunePiuVicino;
        } else {
            // Nessun comune trovato
            return "Nessun comune trovato nelle vicinanze";
        }
    }
}
