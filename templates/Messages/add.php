<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Messages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="messages form content">
            <?= $this->Form->create($message) ?>
            <fieldset>
                <legend><?= __('Add Message') ?></legend>
                <?php
                    echo $this->Form->control('sender_id');
                    echo $this->Form->control('recever_id');
                    echo $this->Form->control('content');
                    echo $this->Form->control('subject');
                    echo $this->Form->control('read_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
