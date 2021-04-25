<div class="columns">
    <div class="column is-half is-three-quarters"></div>
    <div class="container has-text-centered">

        <div class="card">

            <p class="title is-4 ">Créer un compte</p>
            <div class="card-content">
                <div class="field">
                    <?= $this->Form->create($new) ?>
                    <?= $this->Form->control('username', ['class' => "input"]) ?>
                    <?= $this->Form->control('password', ['class' => "input", 'type' => "password"]) ?>
                    <?= $this->Form->button('Créer un compte', ['class' => "button is-primary"]) ?>
                    <?= $this->Form->end ?>
                </div>
            </div>
        </div>
    </div>
</div>
