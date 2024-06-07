<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visualizza Segnalazione</title>
  <link rel="stylesheet" href="<?php echo base_url('css/styleNuovaSegn.css'); ?>">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>

<body>

  <script src="<?php echo base_url('js/Dropdown.js'); ?>"></script>
  <script src="<?php echo base_url('js/NuovaSegn.js'); ?>"></script>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <div style="height: 1300px; background-image: url('<?php echo base_url('images/backgroundNuovaSegn.jpg'); ?>'); ?>');">


    <div class="container">
      <div class="form-wrap" style="width: 600px !important; margin-top: 200px;">

        <div class="form-title">
          <span class="form-title-1">Visualizza Segnalazione</span>
        </div>
        <p>Codice identificativo: <?php echo $segnalazione->segnalazioneId; ?></p>
        <p>Tipo di notifica: <?php echo $segnalazione->TipoProblema; ?></p>
        <p>Titolo: <?php echo $segnalazione->Titolo; ?></p>
        <p>Descrizione: <?php echo $segnalazione->Descrizione; ?></p>
        <p>Stato: <?php echo $segnalazione->Stato; ?></p>

        <div id="map" style="height: 300px;"></div>

        <script>
          var map = L.map('map').setView([<?php echo $segnalazione->CoordinataLat; ?>, <?php echo $segnalazione->CoordinataLon; ?>], 13);

          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);

          var marker = L.marker([<?php echo $segnalazione->CoordinataLat; ?>, <?php echo $segnalazione->CoordinataLon; ?>]).addTo(map);
        </script>

        <!-- Sezione per i file allegati -->
        <div class="allegati-wrap">
          <span class="label">Allegati:</span>
          <ul>
            <?php if (!empty($allegati)): ?>
              <?php foreach ($allegati as $allegato): ?>
                <li><a href="<?php echo base_url($allegato["PercorsoFile"]); ?>" target="_blank">Scarica allegato</a></li>
              <?php endforeach; ?>
            <?php else: ?>
              <li>Nessun allegato disponibile</li>
            <?php endif; ?>
          </ul>
        </div>

        <div class="btn-wrap">
          <button class="btn-form" type="button" onclick="inviaNuovaSegnalazione()">Invia</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
