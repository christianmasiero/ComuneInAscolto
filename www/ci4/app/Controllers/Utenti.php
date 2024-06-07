<?php

namespace App\Controllers;

use App\Models\UtentiModel;
use CodeIgniter\Controller;

class Utenti extends BaseController
{
    // Mostra la vista per il login
    public function vLogin($data = [])
    {
        echo view('navbar/index.php');
        echo view('Login/index.php', $data);
        echo view('vwfooter.php');
    }

    // Mostra la vista per la registrazione
    public function vSignup()
    {
        echo view('navbar/index.php');
        echo view('signup/index.php');
        echo view('vwfooter.php');
    }

    // Mostra la vista per il cambio password
    public function vCambioPass()
    {
        echo view('navbar/index.php');
        echo view('Login/cambioPass.php');
        echo view('vwfooter.php');
    }

    // Mostra la vista del profilo utente
    public function vProfilo()
    {
        $model = new UtentiModel();
        $userId = session()->get('user_id');
        $data['userInfo'] = $model->getUserInfo($userId);

        echo view('navbar/index.php');
        echo view('Profilo/index.php', $data);
        echo view('vwfooter.php');
    }

    // Gestisce il login dell'utente
    public function loggingIn()
    {
        helper(['session']);

        $model = new UtentiModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $utente = $model->accesso($email, $password);

        if ($utente != null) {
            session()->set([
                'logged_in' => true,
                'user_id' => $utente['UtenteId'],
                'ruolo' => $utente['RuoloId'],
                'nome_completo' => $utente['NomeCompleto']
            ]);
            return redirect()->to('/home');
        } else {
            $data['error'] = 'Email o password non validi';
            $this->vLogin($data);
        }
    }

    // Gestisce la registrazione di un nuovo utente
    public function signingUp()
{
    $model = new UtentiModel();

    $data = [
        'ruoloID' => 1,
        'nome' => $this->request->getPost('nome'),
        'cognome' => $this->request->getPost('cognome'),
        'password' => $this->request->getPost('password'),
        'email' => $this->request->getPost('email'),
        'telefono' => $this->request->getPost('telefono'),
        // Assicurati che il nome del campo del comune di residenza corrisponda al nome nel modello UtentiModel
        'comuneResidenza' => $this->request->getPost( 'comuneresidenza' ),
        'username' => $this->request->getPost('username')
    ];

    $model->signingUp($data);

    return redirect()->to('/home');
}

    // Gestisce la modifica dei dati dell'utente
    public function modificaDati()
    {
        $model = new UtentiModel();

        $data = [
            'nome' => $this->request->getPost('nome'),
            'cognome' => $this->request->getPost('cognome'),
            'email' => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
            'comuneResidenza' => $this->request->getPost('comuneresidenza')
        ];

        $model->updateUserInfo(session()->get('user_id'), $data);

        return redirect()->to('/utenti/vProfilo');
    }

    // Gestisce il cambio password dell'utente
    public function cambiaPassword()
    {
        $model = new UtentiModel();

        $passwordAttuale = $this->request->getPost('password_attuale');
        $nuovaPassword = $this->request->getPost('nuova_password');
        $verificaPassword = $this->request->getPost('verifica_nuova_password');

        if ($nuovaPassword !== $verificaPassword) {
            echo "Le nuove password non corrispondono.";
            return;
        }

        $model->cambiaPassword(session()->get('user_id'), $passwordAttuale, $nuovaPassword);

        return redirect()->to('/utenti/vProfilo');
    }

    // Gestisce il logout dell'utente
    public function esci()
    {
        session()->destroy();
        return redirect()->to('/home');
    }
}
