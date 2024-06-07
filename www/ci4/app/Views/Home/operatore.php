<div class="hero" style="background-image: url('<?php echo base_url('images/background.jpg'); ?>');">
    <div class="container mt-5" style="padding-top: 200px; margin-top: 0 !important;">
        <div class="row">
            <?php foreach ($results1 as $row): ?>
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body" style="padding-right: 0px; padding-left: 0px; padding-top: 0px;">
                        <img src="<?php echo base_url('images/segnalazione.png'); ?>" class="card-img-top" alt="Immagine Card">
                        <h3><?php echo $row->TipoProblema; echo $row->SegnalazioneId?></h3>
                        <h5><a href="<?php echo base_url('Segnalazioni/vVisualizzaSegn/') . '?' . http_build_query(array('segnalazioneid' => $row->SegnalazioneId)); ?>"><?php echo $row->Titolo; ?></a></h5>
                        <?php
                            $descrizione = $row->Descrizione;
                            // Verifica se la descrizione supera i 40 caratteri
                            if (strlen($descrizione) > 40) {
                                // Tronca la descrizione a 40 caratteri
                                $descrizione = substr($descrizione, 0, 40) . "...";
                            }
                        ?>
                        <p><?php echo $descrizione; ?></p>
                        <!-- Aggiungi pulsante per eliminare la segnalazione -->
                        <form action="<?= site_url('Segnalazioni/eliminaSegn/' . $row->SegnalazioneId) ?>" method="post">
    <button type="submit" class="btn btn-danger">Elimina</button>
</form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
