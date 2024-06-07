<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profilo</title>
  <link rel="stylesheet" href="<?php echo base_url('css/styleNuovaSegn.css'); ?>">
</head>

<body>
  <script src="<?php echo base_url('js/Dropdown.js'); ?>"></script>
  <script src="<?php echo base_url('js/Profilo.js'); ?>"></script>
  <div style="height: 1300px; background-image: url('<?php echo base_url('images/backgroundNuovaSegn.jpg'); ?>');">
    <div class="container">
      <div class="form-wrap" style="width: 600px !important;">
        <div class="form-title">
          <span class="form-title-1">Profilo Utente</span>
        </div>
        <form action="/utenti/ModificaDati" method="post">
          <div class="form-group" style="margin-bottom: 0;">
            <div class="input-wrap">
              <span class="label">Nome:</span>
              <input disabled class="input modifica" type="text" name="nome" placeholder="Enter full name"
                value="<?php echo isset($userInfo->nome) ? $userInfo->nome : ''; ?>">
            </div>
            <div class="input-wrap">
              <span class="label">Cognome:</span>
              <input disabled class="input modifica" type="text" name="cognome" placeholder="Enter full name"
                value="<?php echo isset($userInfo->cognome) ? $userInfo->cognome : ''; ?>">
            </div>
          </div>
          <div class="input-wrap">
            <span class="label">Email:</span>
            <input disabled class="input modifica" type="text" name="email" placeholder="Inserisci email"
              value="<?php echo isset($userInfo->email) ? $userInfo->email : ''; ?>">
          </div>

          <div class="input-wrap">
            <span class="label">Telefono:</span>
            <input disabled class="input modifica" type="text" name="telefono"
              placeholder="Inserisci il numero di telefono"
              value="<?php echo isset($userInfo->telefono) ? $userInfo->telefono : ''; ?>">
          </div>

          <div class="input-wrap">
            <span class="label">Comune:</span>
            <input disabled class="input modifica" id="searchInput" type="text" name="comuneresidenza" placeholder="Search..."
              value="<?php echo isset($userInfo->comuneresidenza) ? $userInfo->comuneresidenza : ''; ?>">
            <div id="searchResults" class="searchResults"></div>
          </div>


          <!-- Aggiungi altri campi del profilo che desideri modificare -->

          <div class="btn-wrap">
            <input type="button" class="btn-form" style="background-color: blue;" onclick="modificaDati()" id="btnMod" value="Modifica Dati">
            <button hidden class="btn-form" id="btnSbm" type="submit">Salva modifiche</button>
            <input hidden type="button" class="btn-form" style="background-color: red;" onclick="location.reload()" id="btnDel" value="Annulla modifiche">
          </div>
        </form>
        <br>
        <hr><br>
        <div class="form-title">
          <span class="form-title-1">Cambio Password</span>
        </div>
        <form action="CambiaPassword" method="post">
          <div class="input-wrap">
            <span id="psw1" class="label">Password attuale:</span>
            <input class="input" type="password" name="password_attuale" placeholder="Inserisci la password attuale">
          </div>
          <div class="input-wrap">
            <span id="psw2" class="label">Nuova password:</span>
            <input class="input" type="password" name="nuova_password" placeholder="Inserisci la nuova password">
          </div>
          <div class="input-wrap">
            <span id="psw3" class="label">Verifica nuova password:</span>
            <input class="input" type="password" name="verifica_nuova_password"
              placeholder="Verifica la nuova password">
          </div>

          <div class="btn-wrap">
            <button class="btn-form" type="submit">Cambia Password</button>
          </div>
        </form>
        <form method="post" action="esci">
          <div class="btn-wrap">
            <button style="background-color: rgb(182, 0, 0);" class="btn-form" type="submit">Esci dal profilo</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>

</html>