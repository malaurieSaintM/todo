<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Todolist[]|\Cake\Collection\CollectionInterface $todolists
 */
?>
<div class="todolists index content">
    <?= $this->Html->link(__('New Todolist'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Todolists') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('picture') ?></th>
                    <th><?= $this->Paginator->sort('visibility') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($todolists as $todolist): ?>
                <tr>
                    <td><?= $this->Number->format($todolist->id) ?></td>
                    <td><?= h($todolist->created) ?></td>
                    <td><?= h($todolist->modified) ?></td>
                    <td><?= h($todolist->title) ?></td>
                    <td><?= h($todolist->picture) ?></td>
                    <td><?= h($todolist->visibility) ?></td>
                    <td><?= $todolist->has('user') ? $this->Html->link($todolist->user->id, ['controller' => 'Users', 'action' => 'view', $todolist->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $todolist->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $todolist->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $todolist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $todolist->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
