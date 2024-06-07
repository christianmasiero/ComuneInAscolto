<?php

namespace App\Controllers;

use App\Models\SegnalazioniModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
    {
        // Verifica se l'utente è autenticato come operatore
        if (isset($_SESSION['ruolo']) && $_SESSION['ruolo'] == 2) {
            // Se l'utente è un operatore, carica un'interfaccia operatore personalizzata
            return $this->showOperatorInterface();
        } else {
            // Reindirizza l'utente alla pagina di login se non è autenticato
            return $this->showUserInterface();
        }
    }

    // Funzione per caricare l'interfaccia operatore
    public function showOperatorInterface()
    {
        // Carica il modello per ottenere le segnalazioni
        $model = new SegnalazioniModel();
        $data['results1'] = $model->getSegnalazioni();

        // Carica la vista della navbar
        echo view('navbar/index.php');
        // Carica la vista personalizzata per l'operatore
        echo view('Home/operatore.php', $data);
        // Carica la vista del footer
        echo view('vwfooter.php');
    }

    // Funzione per caricare l'interfaccia predefinita per gli utenti
    public function showUserInterface()
    {
        // Carica il modello per ottenere le segnalazioni
        $model = new SegnalazioniModel();
        $data['results1'] = $model->getSegnalazioni();

        // Carica la vista della navbar
        echo view('navbar/index.php');
        // Carica la vista predefinita per gli utenti
        echo view('Home/index.php', $data);
        // Carica la vista del footer
        echo view('vwfooter.php');
    }
}
