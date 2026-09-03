<div class="tarifs index">
<h1>Tarifs</h1>
<table>
    <tr>
        <th>datedebut</th>
        <th>datefin</th>
        <th>Prix</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($tarifs as $tarif): ?>
        <tr>
            <td><?= $this->Html->link($tarif->datedebut->format('d/m/Y'), ['action' => 'view', 
                $tarif->datedebut->format('Y-m-d'),
                $tarif->datefin->format('Y-m-d'),
                $tarif->Prix]); ?></td>
            <td><?= h($tarif->datefin->format('d/m/Y')) ?></td>
            <td><?= h($tarif->Prix) ?></td>
            <td>
                <div class="actions">
                    <?= $this->Html->link('Edit', ['action' => 'edit', 
                        $tarif->datedebut->format('Y-m-d'),
                        $tarif->datefin->format('Y-m-d'),
                        $tarif->Prix]) ?>
                    <?= $this->Form->postLink('Delete', 
                        ['action' => 'delete', 
                         $tarif->datedebut->format('Y-m-d'),
                         $tarif->datefin->format('Y-m-d'),
                         $tarif->Prix], 
                        ['confirm' => 'Are you sure?']) ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>
