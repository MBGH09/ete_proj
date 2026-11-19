<h1>Voitures</h1>
<table>
    <tr>
        <th>Code</th>
        <th>Nombre de places</th>
        <th>Prix</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($voitures as $voiture): ?>
        <tr>
            <td><?= $this->Html->link($voiture->code, ['action' => 'view', $voiture->code]); ?></td>
            <td><?= h($voiture->nombre_de_places) ?></td>
            <td><?= h($voiture->prix) ?></td>
            <td>
                <div class="actions">
                    <?= $this->Html->link('Edit', ['action' => 'edit', $voiture->code]) ?>
                    <?= $this->Form->postLink('Delete', ['action' => 'delete', $voiture->code], ['confirm' => 'Are you sure?']) ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->Html->link('Add Voiture', ['action' => 'add'], ['class' => 'add-button'])?>
