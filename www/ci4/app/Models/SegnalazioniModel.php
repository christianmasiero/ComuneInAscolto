<?php

namespace App\Models;
use CodeIgniter\Model;

class SegnalazioniModel extends Model {

    /**
     * Ottiene le ultime 8 segnalazioni
     * 
     * @return array Ultime 8 segnalazioni
     */
    public function getSegnalazioni() {
        $db = db_connect();
        $query = $this->db->query('SELECT * FROM segnalazioni ORDER BY dataCreazione DESC LIMIT 8');
        return $query->getResult();
    }

    /**
     * Crea una nuova segnalazione nel database
     * 
     * @param array $data Dati della segnalazione da inserire
     * @return int ID della segnalazione creata
     */
    public function createSegn($data){
        $db = db_connect();
        $query = $this->db->query( 'SELECT MAX(segnalazioneId) as lastsegnalazioneID FROM segnalazioni' );
        $result = $query->getRow();
        $segnalazioneId = $result->lastsegnalazioneID + 1;
        $data['segnalazioneId'] = $segnalazioneId;
        $this->db->table("segnalazioni")->insert( $data );
        return $segnalazioneId;
    }

    /**
     * Ottiene i dettagli di una segnalazione dato l'ID
     * 
     * @param int $segnalazioneId ID della segnalazione
     * @return object|bool Dettagli della segnalazione, o false se non trovata
     */
    public function getSegnalazioneById($segnalazioneId)
    {
        // Query per ottenere i dati della segnalazione basati sull'ID
        $query = $this->db->table('segnalazioni')
                          ->select('segnalazioneId, TipoProblema, Titolo, Descrizione, DataCreazione, Stato, CoordinataLat, CoordinataLon')
                          ->where('segnalazioneId', $segnalazioneId)
                          ->get();

        // Restituisci il risultato della query
        return $query->getRow();
    }

    /**
     * Elimina una segnalazione dato l'ID
     * 
     * @param int $segnalazioneId ID della segnalazione da eliminare
     */
    public function eliminaSegnalazione($segnalazioneId) {
        $this->db->table('segnalazioni')->where('segnalazioneId', $segnalazioneId)->delete();
    }

    /**
     * Elimina gli allegati associati a una segnalazione dato l'ID
     * 
     * @param int $segnalazioneId ID della segnalazione
     */
    public function eliminaAllegati($segnalazioneId)
    {
        // Elimina gli allegati associati alla segnalazione specificata
        $this->db->table('allegati')->where('SegnalazioneId', $segnalazioneId)->delete();
    }
}
