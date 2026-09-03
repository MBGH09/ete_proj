<h1>Add Reservation</h1>
<div class="reservations form">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <?= $this->Form->control('client_name', [
            'type' => 'text', 
            'label' => 'Nom du Client',
            'placeholder' => 'Entrez le nom du client',
            'list' => 'clients-list'
        ]) ?>
        <datalist id="clients-list">
            <?php foreach ($clients as $clientName): ?>
                <option value="<?= h($clientName) ?>">
            <?php endforeach; ?>
        </datalist>
        <?= $this->Form->control('code_chalets', [
            'type' => 'select',
            'options' => $chalets,
            'empty' => 'Sélectionner un chalet',
            'label' => 'Code Chalet'
        ]) ?>
        <?= $this->Form->control('date_entree', ['type' => 'date']) ?>
        <?= $this->Form->control('date_sortie', ['type' => 'date']) ?>
        <?= $this->Form->control('montant', ['type' => 'text']) ?>
    </fieldset>
    <?= $this->Form->button(__('Save Reservation')) ?>
    <?= $this->Form->end() ?>
</div>
