<?php
namespace App\Controllers;

use App\Models\SegnalazioniModel;
use App\Models\AllegatiModel;
use App\Models\ComuniModel;
use CodeIgniter\Controller;
use CodeIgniter\Files\File;

class Segnalazioni extends BaseController
{

    public function vAllSegn(){
        $model = new SegnalazioniModel();
        $data['segnalazioni'] = $model->getSegnalazioni();
        echo view('navbar/index.php');
        echo view('Segnalazioni/allSegn.php', $data);
        echo view('vwfooter.php');  
    }
    // Mostra la vista per la creazione di una nuova segnalazione
    public function vNuovaSegn()
    {
        // Carica la vista della navbar
        echo view('navbar/index.php');
        // Carica la vista per la creazione di una nuova segnalazione
        echo view('Segnalazioni/nuovaSegn.php');
        // Carica la vista del footer
        echo view('vwfooter.php');
    }

    // Mostra la vista per la visualizzazione di una segnalazione
    public function vVisualizzaSegn()
    {
        // Istanzia i modelli per le segnalazioni e gli allegati
        $modelSegnalazioni = new SegnalazioniModel();
        $modelAllegati = new AllegatiModel();
        // Ottieni l'ID della segnalazione dalla richiesta GET
        $segnalazioneId = $this->request->getGet('segnalazioneid');

        if ($segnalazioneId !== null) {
            // Ottieni la segnalazione e gli allegati associati
            $segnalazione = $modelSegnalazioni->getSegnalazioneById($segnalazioneId);
            $allegati = $modelAllegati->getAllegatiBySegnalazioneId($segnalazioneId);

            // Passa i dati alla vista
            $data = ['segnalazione' => $segnalazione, 'allegati' => $allegati];

            // Carica la vista della navbar
            echo view('navbar/index.php');
            // Carica la vista per visualizzare la segnalazione
            echo view('Segnalazioni/visualizzaSegn.php', $data);
            // Carica la vista del footer
            echo view('vwfooter.php');
        } else {
            // Reindirizza se l'ID della segnalazione non è stato fornito
            echo view('errors/error.php');
        }
    }

    // Reindirizza alla home
    public function redirect()
    {
        return redirect()->to('Home');
    }

    // Mostra un file
    public function show($filename)
    {
        $path = WRITEPATH . 'uploads/' . $filename;

        // Verifica se il file esiste
        if (!file_exists($path)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($filename);
        }

        // Ottieni il tipo MIME del file
        $file = new File($path);
        $mimeType = $file->getMimeType();

        // Restituisci il file come risposta
        return $this->response
            ->setContentType($mimeType)
            ->setBody(file_get_contents($path));
    }

    // Crea una nuova segnalazione
    public function creaSegn()
    {
        // Istanzia i modelli per le segnalazioni e gli allegati
        $modelSegnalazioni = new SegnalazioniModel();
        $modelAllegati = new AllegatiModel();

        // Creazione dei dati della segnalazione
        $dataSegnalazione = [
        'utenteID' => session()->get('user_id'),
        'titolo' => $this->request->getPost('titolo'),
        'email' => $this->request->getPost('email'),
        'telefono' => $this->request->getPost('telefono'),
        'TipoProblema' => $this->request->getPost('notifica'),
        'Descrizione' => $this->request->getPost('messaggio'),
        'CoordinataLat' => $this->request->getPost('coordinatalat'),
        'CoordinataLon' => $this->request->getPost('coordinatalon')
    ];

        // Creazione della segnalazione
        $segnalazioneId = $modelSegnalazioni->createSegn($dataSegnalazione);

        // Gestione degli allegati
        if ($this->request->getFiles() && isset($_FILES['allegati'])) {
            $uploadedFiles = $this->request->getFiles();

            foreach ($uploadedFiles['allegati'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    // Sposta il file nella directory degli allegati
                    $newName = $file->getRandomName();
                    $file->move(WRITEPATH . 'uploads/', $newName);
                    $percorsoAllegato = 'uploads/' . $newName;
                    // Inserisci il percorso dell'allegato nel database
                    $modelAllegati->inserisciAllegato($segnalazioneId, $percorsoAllegato);
                }
            }
        }
    }

    // Esegui una ricerca
    public function search()
    {
        // Ottieni il testo di ricerca dalla richiesta GET
        $query = $this->request->getGet('query');

        // Esegui la query per trovare i risultati della ricerca basati sul testo di ricerca
        $comuniModel = new ComuniModel();
        $results = $comuniModel->searchComuni($query);

        // Carica la vista parziale dei risultati della ricerca e passa i risultati
        return view('partials/search_results', ['results' => $results]);
    }

    // Elimina una segnalazione
    public function eliminaSegn($segnalazioneId)
    {
        // Verifica se l'utente è un operatore (da implementare questa logica)
        if ($_SESSION['ruolo'] == 2) {
            // L'utente è autorizzato a eliminare la segnalazione
            $modelSegnalazioni = new SegnalazioniModel();
            $modelAllegati = new AllegatiModel();
            // Elimina gli allegati associati alla segnalazione
            $modelAllegati->eliminaAllegati($segnalazioneId);
            // Elimina la segnalazione stessa
            $modelSegnalazioni->eliminaSegnalazione($segnalazioneId);
            // Reindirizza l'utente alla pagina delle segnalazioni o ad un'altra pagina appropriata
            return redirect()->to('/home');
        } else {
            // L'utente non è autorizzato, gestisci l'errore o reindirizzalo ad un'altra pagina
            return redirect()->to('/index.html');
        }
    }
}
