<h1>Chalets</h1>
<table>
    <tr>
        <th>Code</th>
        <th>Nombre de chambre</th>
        <th>Prix</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($chalets as $chalet): ?>
        <tr>
            <td><?= $this->Html->link($chalet->code, ['action' => 'view', $chalet->code]); ?></td>
            <td><?= h($chalet->nombre_de_chambre) ?></td>
            <td><?= h($chalet->prix) ?></td>
            <td>
                <div class="actions">
                    <?= $this->Html->link('Edit', ['action' => 'edit', $chalet->code]) ?>
                    <?= $this->Form->postLink('Delete', ['action' => 'delete', $chalet->code], ['confirm' => 'Are you sure?']) ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->Html->link('Add Chalet', ['action' => 'add'], ['class' => 'add-button'])?>
