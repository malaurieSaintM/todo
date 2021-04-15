<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Copy $copy
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Copy'), ['action' => 'edit', $copy->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Copy'), ['action' => 'delete', $copy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $copy->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Copies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Copy'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="copies view content">
            <h3><?= h($copy->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($copy->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Newlist Id') ?></th>
                    <td><?= $this->Number->format($copy->newlist_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Copy Id') ?></th>
                    <td><?= $this->Number->format($copy->copy_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($copy->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($copy->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Copies') ?></h4>
                <?php if (!empty($copy->copies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Newlist Id') ?></th>
                            <th><?= __('Copy Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($copy->copies as $copies) : ?>
                        <tr>
                            <td><?= h($copies->id) ?></td>
                            <td><?= h($copies->created) ?></td>
                            <td><?= h($copies->modified) ?></td>
                            <td><?= h($copies->newlist_id) ?></td>
                            <td><?= h($copies->copy_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Copies', 'action' => 'view', $copies->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Copies', 'action' => 'edit', $copies->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Copies', 'action' => 'delete', $copies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $copies->id)]) ?>
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
