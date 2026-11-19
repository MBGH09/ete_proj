<h1>Edit Voiture</h1>
<div class="voitures form">
    <?= $this->Form->create($voiture) ?>
    <fieldset>
        
        <?= $this->Form->control('code', ['type' => 'text']) ?>
        <?= $this->Form->control('nombre_de_places', ['type' => 'text', 'label' => 'Nombre de places']) ?>
        <?= $this->Form->control('prix', ['type' => 'text']) ?>
    </fieldset>
    <?= $this->Form->button(__('Save Voiture')) ?>
    <?= $this->Form->end() ?>
</div>
