<h1>Clients</h1>
<table>
    <tr>
        <th>id</th>
        <th>Nom</th>
        <th>tel</th>
        <th>Email</th>
        <th>Adresse</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($clients as $client): ?>
        <tr>
            <td><?= $this->Html->link($client->id, ['action' => 'view', $client->id]); ?></td>
            <td><?= h($client->name) ?></td>
            <td><?= h($client->tel) ?></td>
            <td><?= h($client->email) ?></td>
            <td><?= h($client->adresse) ?></td>
            <td>
                <div class="actions">
                    <?= $this->Html->link('Edit', ['action' => 'edit', $client->id]) ?>
                    <?= $this->Form->postLink('Delete', ['action' => 'delete', $client->id], ['confirm' => 'Are you sure?']) ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->Html->link('Add Client', ['action' => 'add'], ['class' => 'add-button'])?>
