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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $todolist->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $todolist->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Todolists'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="todolists form content">
            <?= $this->Form->create($todolist) ?>
            <fieldset>
                <legend><?= __('Edit Todolist') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('picture');
                    echo $this->Form->control('visibility');
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
