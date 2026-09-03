<h1>Add User</h1>
<div class="users form">
    <?= $this->Form->create($user) ?>
    <fieldset>
        
        <?= $this->Form->control('name', ['type' => 'text']) ?>
        <?= $this->Form->control('login', ['type' => 'text']) ?>
        <?= $this->Form->control('password', ['type' => 'text']) ?>
        <?= $this->Form->control('adresse', ['type' => 'text']) ?>
    </fieldset>
    <?= $this->Form->button(__('Save User')) ?>
    <?= $this->Form->end() ?>
</div>
