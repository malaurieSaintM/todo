<div class="columns">
    <div class="column is-half is-three-quarters"></div>
    <div class="container has-text-centered">
        <div class="card">
            <p class="title is-4">Se connecter</p>
            <div class="card-content">
                <div class="field">
                    <?= $this->Form->create() ?>
                    <?= $this->Form->control('username', ['class' => "input"]) ?>
                    <?= $this->Form->control('password', ['class' => "input", 'type' => "password"]) ?>
                    <?= $this->Form->button('Se connecter', ['class' => "button is-primary"]) ?>
                    <?= $this->Form->end ?>
                </div>
            </div>
        </div>
    </div>
</div>
