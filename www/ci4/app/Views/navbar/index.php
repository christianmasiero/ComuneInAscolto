<?php
if(session_status() === PHP_SESSION_NONE) {
    // Controlla se una sessione è già attiva
    session_start(); // Avvia la sessione solo se non è già attiva
}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('fonts/icomoon/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/owl.carousel.min.css'); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">

    <title>Website Menu #9</title>
</head>
<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    <!-- NAVBAR -->
    <header class="site-navbar mt-3 fixed-top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="site-logo col-6"><a href="<?php echo base_url('Home'); ?>">COMUNEINASCOLTO</a></div>

                <nav class="mx-auto site-navigation">
                    <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                        <li><a href="<?php echo base_url('Home') ?>" class="nav-link active">Home</a></li>
                        <li><a href="<?php echo base_url('About'); ?>">Chi siamo</a></li>
                        <li><a href="<?php echo base_url('Segnalazioni/vAllSegn'); ?>">Tutte le segnalazioni</a></li>
                        <!-- Aggiungi gli altri elementi del menu con i percorsi aggiustati -->
                    </ul>
                </nav>
                
                <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                    <div class="ml-auto">
                        <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                            <!-- Se l'utente è autenticato, mostra il pulsante "Nuova segnalazione" -->
                            <a href="<?php echo base_url('Segnalazioni/vNuovaSegn'); ?>" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Nuova segnalazione</a>
                            <!-- Modifica il testo e il collegamento del pulsante quando l'utente è autenticato -->
                            <a href="<?php echo base_url('Utenti/vProfilo'); ?>" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-user"></span>Profilo</a>
                        <?php else: ?>
                            <!-- Se l'utente non è autenticato, mostra il pulsante "Accedi" -->
                            <a href="<?php echo base_url('Utenti/vLogin') ?>" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Accedi</a>
                        <?php endif; ?>
                    </div>
                    <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                </div>
            </div>
        </div>
    </header>
    
    <!-- <div class="hero" style="background-image: url('<?php //echo base_url('images/background.jpg'); ?>');"></div> -->
    
    <script src="<?php echo base_url('js/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/jquery.sticky.js'); ?>"></script>
    <script src="<?php echo base_url('js/main.js'); ?>"></script>
</body>
</html>
