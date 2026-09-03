<h1>Users</h1>

<table>
    <tr>
        <th> ID</th>
        <th>Name</th>
        <th>Login</th>
        <th>Password</th>
        <th>Adresse</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Html->link($user->id, ['action' => 'view', $user->id]); ?></td>
            <td><?= $this->Html->link($user->name, ['action' => 'view', $user->id]); ?></td>
            <td><?= h($user->login) ?></td>
            <td><?= h($user->password) ?></td>
            <td><?= h($user->adresse) ?></td>
            <td><?= $user->created ? h($user->created->format(DATE_RFC850)) : 'N/A' ?></td>
            <td>
                <div class="actions">
                    <?= $this->Html->link('Edit', ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink('Delete', ['action' => 'delete', $user->id], ['confirm' => 'Are you sure?']) ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    
</table>
<?= $this->Html->link('Add User', ['action' => 'add'], ['class' => 'add-button'])?>
