<p><?= h($tarif->datedebut->format('d/m/Y')) ?></p>
<p><?= h($tarif->datefin->format('d/m/Y')) ?></p>
<p><?= h($tarif->Prix) ?></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', 
    $tarif->datedebut->format('Y-m-d'), 
    $tarif->datefin->format('Y-m-d'), 
    $tarif->Prix]) ?></p>
