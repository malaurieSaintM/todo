<div class="columns">
    <div class="column is-half is-offset-one-quarter">
    <div class="column has-text-centered">
        <div class="card">

            <p class="title is-4">Modifier une liste</p>
            <div class="card-content">
                <div class="field">
                    <?= $this->Form->create($q, ['enctype' => 'multipart/form-data']) ?>

                    <?= $this->Form->Control('picture', ['class' => "file-input", 'label' => 'Choisir un fichier', 'type' => 'file']) ?>


                    <?= $this->Form->Control('title', ['class' => "input"]) ?>
                    <?= $this->Form->control('visibility', ['class' => "checkbox", 'type' => 'checkbox']) ?>
                    <?= $this->Form->button('Modifier', ['class' => "button is-primary"]) ?>


                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
