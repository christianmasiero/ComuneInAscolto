<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="<?php echo base_url('css/styleNuovaSegn.css'); ?>">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>
  <div class="hero" style="background-image: url('<?php echo base_url('images/backgroundLogin.jpg'); ?>'); height: 100vh;">
    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 10px;">
              <div class="card-body p-4 p-lg-5 text-black">
                <h1>Tutte le Segnalazioni</h1>
                <div id="map"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    var map = L.map('map').setView([41.9028, 12.4964], 13); // Coordinate di Roma come esempio

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var segnalazioni = [
      <?php foreach ($segnalazioni as $segnalazione): ?>
        {
          "lat": "<?php echo $segnalazione->CoordinataLat ?>",
          "lng": "<?php echo $segnalazione->CoordinataLon ?>",
          "descrizione": "<?php echo addslashes($segnalazione->Descrizione) ?>",
          "id": "<?php echo $segnalazione->SegnalazioneId ?>",
          "titolo": "<?php echo $segnalazione->Titolo ?>"
        },
      <?php endforeach; ?>
    ];

    segnalazioni.forEach(function(segnalazione) {
      L.marker([parseFloat(segnalazione.lat), parseFloat(segnalazione.lng)])
        .addTo(map)
        .bindPopup("<a href='<?php echo base_url("Segnalazioni/vVisualizzaSegn?segnalazioneid=");?>" + segnalazione.id + "'>" + segnalazione.titolo  + "</a><p>" + segnalazione.descrizione +"</p>"); //segnalazione.descrizione

    });
  </script>
</body>
</html>
