<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="<?php echo base_url('css/styleNuovaSegn.css'); ?>">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>

<body>

  <script src="<?php echo base_url('js/Dropdown.js'); ?>"></script>
  <script src="<?php echo base_url('js/NuovaSegn.js'); ?>"></script>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <div style="height: 1300px; background-image: url('<?php echo base_url('images/backgroundNuovaSegn.jpg'); ?>');">


    <div class="container">
      <div class="form-wrap">

        <div class="form-title">
          <span class="form-title-1">Nuova Segnalazione</span>
        </div>

        <form class="form" method="POST" action="creaSegn" enctype="multipart/form-data">
          <div class="form-group" style="margin-bottom: 0;">

            <div class="input-wrap">
              <span class="label">Nome completo:</span>
              <input class="input" type="text" id="nome" value="<?php echo session()->get('nome_completo'); ?>" disabled>
            </div>
            <div class="input-wrap">
              <span class="label">Email:</span>
              <input class="input" type="text" id="email" placeholder="Inserisci email">
            </div>

            <div class="input-wrap">
              <span id="avviso" class="label">Telefono:</span>
              <input class="input" type="text" id="telefono" placeholder="Inserisci il numero di telefono">
            </div>

            <div class="input-wrap">
              <span class="label">Comune:</span>
              <input class="input" type="text" id="searchInput" placeholder="Search...">
              <div id="searchResults" class="searchResults"></div>
            </div>
          </div>



          <div id="map"></div>


          <div class="form-group" style="margin-bottom: 0;">
            <div class="dropdown input-wrap">
              <span class="label">Tipo di notifica:</span>
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Seleziona un'opzione
              </a>
              <input type="hidden" name="notifica" id="notifica">

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" onclick="updateSelectedOption('Segnalazione')">Segnalazione</a>
                <a class="dropdown-item" onclick="updateSelectedOption('Elogio')">Elogio</a>
                <a class="dropdown-item" onclick="updateSelectedOption('Consiglio')">Consiglio</a>
              </div>
            </div>


            <script>
              function updateSelectedOption(option) {
                document.getElementById("dropdownMenuLink").innerText = option;
                document.getElementById("notifica").value = option;
              }
            </script>

<div class="input-wrap allegati">
    <label for="allegato" class="label">Allegati:</label>
    <input type="file" name="allegati[]" id="allegato" multiple>
  </div>



          </div>

          <div class="input-wrap">
            <span class="label">Titolo:</span>
            <input type="text" class="input" id="titolo" placeholder="Your Comment..."></input>
          </div>

          <div class="input-wrap">
            <span class="label">Messaggio:</span>
            <textarea class="input" id="messaggio" placeholder="Your Comment..."></textarea>
          </div>


          <div class="btn-wrap">
            <button class="btn-form" type="button" onclick="inviaNuovaSegnalazione()">Invia</button>

          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>