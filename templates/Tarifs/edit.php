<h1>Edit Tarif</h1>
<div class="tarifs form">
    <?= $this->Form->create($tarif) ?>
    <fieldset>
        
        <?= $this->Form->control('datedebut', ['type' => 'date']) ?>
        <?= $this->Form->control('datefin', ['type' => 'date']) ?>
        <?= $this->Form->control('Prix', ['type' => 'number', 'step' => '0.01']) ?>
    </fieldset>
    <?= $this->Form->button(__('Save Tarif')) ?>
    <?= $this->Form->end() ?>
</div>
