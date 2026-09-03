<h1>Edit Chalet</h1>
<div class="chalets form">
    <?= $this->Form->create($chalet) ?>
    <fieldset>
        
        <?= $this->Form->control('code', ['type' => 'text']) ?>
        <?= $this->Form->control('nombre_de_chambre', ['type' => 'text']) ?>
        <?= $this->Form->control('prix', ['type' => 'text']) ?>
    </fieldset>
    <?= $this->Form->button(__('Save Chalet')) ?>
    <?= $this->Form->end() ?>
</div>
