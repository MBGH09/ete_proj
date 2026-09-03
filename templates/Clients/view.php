<h2><?= h($client->name) ?></h2>
<p>ID: <?= h($client->id) ?></p>
<p>Email: <?= h($client->email) ?></p>
<p>tel: <?= h($client->tel) ?></p>
<p>Adresse: <?= h($client->adresse) ?></p>

<p><?= $this->Html->link('Edit', ['action' => 'edit', $client->id]) ?></p>