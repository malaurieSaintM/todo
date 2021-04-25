<div class="columns">
    <div class="column is-half is-one-fifth"></div>
    <div class="column has-text-centered">
        <div class="card">

            <p class="title is-4">Modifier mon profile</p>
            <div class="card-content">
                <div class="field">

            <?= $this->Form->create($q, ['enctype' => 'multipart/form-data']) ?>
            <?= $this->Form->control('avatar', ['class' => "file-input",'label' => 'Choisir un nouvel avatar', 'type' => 'file']) ?>

            <?= $this->Form->control('username', ['class' => "input", 'label' => 'username']) ?>
            <?= $this->Form->control('newpassword', ['class' => "input", 'type' => "password"]) ?>

            <?= $this->Form->button('Modifier', ['class' => "button is-primary"]) ?>

            <?= $this->Form->end() ?>
        </div>
    </div>

</div>
