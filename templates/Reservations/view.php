<h2><?= h($reservation->client_id) ?></h2>
<p> Date_entree: <?= h($reservation->date_entree->format('d/m/Y')) ?></p>
<p> Date_sortie: <?= h($reservation->date_sortie->format('d/m/Y')) ?></p>
<p> Montant: <?= h($reservation->montant) ?></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', 
    $reservation->client_id, 
    $reservation->date_entree->format('Y-m-d'), 
    $reservation->date_sortie->format('Y-m-d'), 
    $reservation->montant]) ?></p>
