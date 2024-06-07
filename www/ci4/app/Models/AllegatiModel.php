<?php
namespace App\Models;
use CodeIgniter\Model;

class AllegatiModel extends Model {
    
    protected $table = 'Allegati'; // Nome della tabella nel database

    /**
     * Inserisce un nuovo allegato nel database
     * 
     * @param int $idSegnalazione ID della segnalazione
     * @param string $filePercorso Percorso del file allegato
     * @return bool True se l'inserimento ha avuto successo, false altrimenti
     */
    public function inserisciAllegato($idSegnalazione, $filePercorso) {
        $db = db_connect(); // Connessione al database
        $datiAllegato = array(
            'SegnalazioneId' => $idSegnalazione,
            'PercorsoFile' => $filePercorso
        );
        // Inserisce i dati dell'allegato nella tabella
        if (!$this->db->table("allegati")->insert($datiAllegato)) {
            // In caso di errore, logga il messaggio di errore
            $errore = $this->db->error();
            log_message('error', 'Errore durante l\'inserimento dell\'allegato nel database: ' . $errore['message']);
            return false;
        }
        return true;
    }

    /**
     * Recupera gli allegati associati a una specifica segnalazione
     * 
     * @param int $idSegnalazione ID della segnalazione
     * @return array Risultato della query come array
     */
    public function getAllegatiBySegnalazioneId($idSegnalazione) {
        $query = $this->db->table("allegati")
            ->select('PercorsoFile')
            ->where('SegnalazioneId', $idSegnalazione)
            ->get();
        return $query->getResultArray(); // Ritorna i risultati come array
    }

    /**
     * Elimina gli allegati associati a una specifica segnalazione
     * 
     * @param int $idSegnalazione ID della segnalazione
     */
    public function eliminaAllegati($idSegnalazione) {
        // Ottiene il percorso dei file allegati
        $allegati = $this->getAllegatiBySegnalazioneId($idSegnalazione);

        // Elimina il record dal database
        $this->db->table("allegati")
                 ->where('SegnalazioneId', $idSegnalazione)
                 ->delete();

        // Elimina i file fisici dalla cartella "uploads"
        foreach ($allegati as $allegato) {
            $percorsoFile = WRITEPATH . $allegato['PercorsoFile'];
            log_message('debug', "percorso " . $percorsoFile);
            // Controlla se il file esiste e lo elimina
            if (file_exists($percorsoFile)) {
                log_message('debug', "percorso " . "trovato");
                unlink($percorsoFile);
            }
        }
    }
}
