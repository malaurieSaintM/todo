<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Todolist $todolist
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Todolist'), ['action' => 'edit', $todolist->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Todolist'), ['action' => 'delete', $todolist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $todolist->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Todolists'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Todolist'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="todolists view content">
            <h3><?= h($todolist->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($todolist->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Picture') ?></th>
                    <td><?= h($todolist->picture) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $todolist->has('user') ? $this->Html->link($todolist->user->id, ['controller' => 'Users', 'action' => 'view', $todolist->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($todolist->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($todolist->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($todolist->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Visibility') ?></th>
                    <td><?= $todolist->visibility ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Items') ?></h4>
                <?php if (!empty($todolist->items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Todolist Id') ?></th>
                            <th><?= __('Content') ?></th>
                            <th><?= __('Deadline') ?></th>
                            <th><?= __('Status') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($todolist->items as $items) : ?>
                        <tr>
                            <td><?= h($items->id) ?></td>
                            <td><?= h($items->created) ?></td>
                            <td><?= h($items->modified) ?></td>
                            <td><?= h($items->todolist_id) ?></td>
                            <td><?= h($items->content) ?></td>
                            <td><?= h($items->deadline) ?></td>
                            <td><?= h($items->status) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
