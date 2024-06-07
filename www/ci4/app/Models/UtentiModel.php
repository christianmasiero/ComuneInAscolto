<?php

namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class UtentiModel extends Model
 {

    public function Accesso($utente, $password) {
        $db = db_connect();
        
        $query = $this->db->query("SELECT UtenteId, RuoloID, Nome, Cognome FROM utenti WHERE (email = '$utente' OR username = '$utente') AND password = '$password'");
        
        $user = $query->getRow();
        
        if ($user) {
            return [
                'UtenteId' => $user->UtenteId,
                'RuoloId' => $user->RuoloID,
                'NomeCompleto' => $user->Nome . " " . $user->Cognome
            ];
        } else {
            return NULL;
        }
    }
    

    public function SigningUp( $data ) {

        $db = db_connect();
        $query = $this->db->query( 'SELECT MAX(utenteID) as lastUserID FROM utenti' );
        $result = $query->getRow();
        $utenteID = $result->lastUserID + 1;
       $data['utenteID'] = $utenteID;
        $this->db->table("utenti")->insert( $data );
    }

    public function getUserInfo($utenteid)
    {
        $db = db_connect();
        $query = $this->db->query( "SELECT nome, cognome, email, telefono, comuneresidenza from utenti where utenteId = '$utenteid'" );
        $result = $query->getRow();
       return $result;
    }

    public function updateUserInfo($user_id, $data) {
        // Logica per aggiornare le informazioni dell'utente
        $db = db_connect();
        $builder = $db->table('utenti');
        $builder->where('utenteid', $user_id);
        $builder->update($data);
    }

    public function cambiaPassword($utenteID, $password, $nuovaPassword) {
        $db = db_connect();
    
        // Verifica se la password attuale è corretta per l'utente specificato
        $query = $this->db->query("SELECT utenteID FROM utenti WHERE utenteID = ? AND password = ?", [$utenteID, $password]);
        $user = $query->getRow();
    
        if ($user) {
            // Se la password attuale è corretta, aggiorna la password nel database
            $builder = $db->table('utenti');
            $builder->where('utenteID', $utenteID);
            $builder->update(['password' => $nuovaPassword]);
    
            return true; // Restituisci true se il cambio password è avvenuto con successo
        } else {
            return false; // Restituisci false se la password attuale non è corretta
        }
    }
    
}