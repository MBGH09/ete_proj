<h1>Edit Client</h1>
<div class="clients form">
    <?= $this->Form->create($client) ?>
    <fieldset>
        
        <?= $this->Form->control('name', ['type' => 'text']) ?>
        <?= $this->Form->control('tel', ['type' => 'text']) ?>
        <?= $this->Form->control('email', ['type' => 'text']) ?>
        <?= $this->Form->control('adresse', ['type' => 'text']) ?>
    </fieldset>
    <?= $this->Form->button(__('Save Client')) ?>
    <?= $this->Form->end() ?>
</div>
