<div class="view-card">
    <h1>👤 User Details</h1>
    <h2><?= h($user->name) ?></h2>
    <p><strong>ID:</strong> <?= h($user->id) ?></p>
    <p><strong>Login:</strong> <?= h($user->login) ?></p>
    <p><strong>Password:</strong> <?= h($user->password) ?></p>
    <p><strong>Adresse:</strong> <?= h($user->adresse) ?></p>
    <p><strong>Created:</strong> <?= $user->created ? h($user->created->format('d/m/Y H:i:s')) : 'N/A' ?></p>
    <p><strong>Modified:</strong> <?= $user->modified ? h($user->modified->format('d/m/Y H:i:s')) : 'N/A' ?></p>
    <div class="actions">
        <?= $this->Html->link('✏️ Edit', ['action' => 'edit', $user->id], ['class' => 'button']) ?>
        <?= $this->Html->link('📋 Back to List', ['action' => 'index'], ['class' => 'button']) ?>
    </div>
</div>

