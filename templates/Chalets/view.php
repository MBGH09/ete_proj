<h2><?= h($chalet->code) ?></h2>
<p><?= h($chalet->nombre_de_chambre) ?></p>
<p>ID: <?= h($chalet->prix) ?></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $chalet->code]) ?></p>