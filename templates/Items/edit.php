<div class="columns">
    <div class="column is-half is-offset-one-quarter">
    <div class="column has-text-centered">
        <div class="card">


            <p class="title is-4">Modifier un élément</p>
            <div class="card-content">
                <div class="field">

<?= $this->Form->create($q) ?>

<?= $this->Form->control('content', ['class' => 'input']) ?>
<?= $this->Form->control('status', ['type' => 'checkbox', 'class'=>'checkbox']) ?>


<?= $this->Form->button('Modifier', ['class' => "button is-primary"]) ?>

<?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
    </div>
