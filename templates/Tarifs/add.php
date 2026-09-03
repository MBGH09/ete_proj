<h1>Add Tarif</h1>
<div class="tarifs form">
    <?= $this->Form->create($tarif) ?>
    <fieldset>
        <?= $this->Form->control('datedebut', ['type' => 'date', 'required' => true]) ?>
        <?= $this->Form->control('datefin', ['type' => 'date', 'required' => true]) ?>
        <?= $this->Form->control('Prix', ['type' => 'number', 'step' => '0.01', 'required' => true]) ?>
    </fieldset>
    <?= $this->Form->button(__('Save Tarif')) ?>
    <?= $this->Form->end() ?>
</div>
