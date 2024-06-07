<?php

namespace App\Controllers;

use App\Models\UtentiModel;
use CodeIgniter\Controller;

class About extends BaseController{


    public function index(){
        echo view('navbar/index.php');
        // Carica la vista personalizzata per l'operatore
        echo view("About/About.php");
        // Carica la vista del footer
        echo view('vwfooter.php');
    }
}
