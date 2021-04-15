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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $copy->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $copy->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Copies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="copies form content">
            <?= $this->Form->create($copy) ?>
            <fieldset>
                <legend><?= __('Edit Copy') ?></legend>
                <?php
                    echo $this->Form->control('newlist_id');
                    echo $this->Form->control('copy_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
