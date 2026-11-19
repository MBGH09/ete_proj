<h2><?= h($voiture->code) ?></h2>
<p><?= h($voiture->nombre_de_places) ?></p>
<p>ID: <?= h($voiture->prix) ?></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $voiture->code]) ?></p>
