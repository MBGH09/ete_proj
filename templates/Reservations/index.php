<h1>Reservations</h1>
<table>
    <tr>
        <th>client_id</th>
        <th>date_entree</th>
        <th>date_sortie</th>
        <th>montant</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($reservations as $reservation): ?>
        <tr>
            <td><?= $this->Html->link($reservation->client_id, ['action' => 'view', 
                $reservation->client_id, 
                $reservation->date_entree->format('Y-m-d'), 
                $reservation->date_sortie->format('Y-m-d'), 
                $reservation->montant]); ?></td>
            <td><?= h($reservation->date_entree->format('d/m/Y')) ?></td>
            <td><?= h($reservation->date_sortie->format('d/m/Y')) ?></td>
            <td><?= h($reservation->montant) ?></td>
            <td>
                <div class="actions">
                    <?= $this->Html->link('Edit', ['action' => 'edit', 
                        urlencode($reservation->client_id), 
                        urlencode($reservation->date_entree->format('Y-m-d')), 
                        urlencode($reservation->date_sortie->format('Y-m-d')), 
                        urlencode($reservation->montant)]) ?>
                    <?= $this->Form->postLink('Delete', 
                        ['action' => 'delete', 
                         urlencode($reservation->client_id), 
                         urlencode($reservation->date_entree->format('Y-m-d')), 
                         urlencode($reservation->date_sortie->format('Y-m-d')), 
                         urlencode($reservation->montant)], 
                        ['confirm' => 'Are you sure?', 'method' => 'post']) ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->Html->link('Add Reservation', ['action' => 'add'], ['class' => 'add-button'])?>
