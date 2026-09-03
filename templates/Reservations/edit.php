<h1>Edit Reservation</h1>
<div class="reservations form">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        
        <?= $this->Form->control('client_id', ['type' => 'text']) ?>
        <?= $this->Form->control('date_entree', ['type' => 'date']) ?>
        <?= $this->Form->control('date_sortie', ['type' => 'date']) ?>
        <?= $this->Form->control('montant', ['type' => 'text']) ?>
    </fieldset>
    <?= $this->Form->button(__('Save Reservation')) ?>
    <?= $this->Form->end() ?>
</div>
