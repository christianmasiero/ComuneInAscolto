<?php $count = -1; foreach ($results as $result): ?>
    <?php $count++; ?>
    
    <div style="margin-top: <?= $count * 40 ?>px;" class="search-result" onclick="selectComune('<?= $result['nomeComune'] ?>')">
        <?= $result['nomeComune'] ?> (<?= $result['sigla_provincia'] ?>)
    </div>
<?php endforeach; ?>
