<div class="columns">
    <div class="column is-half is-one-fifth"></div>
    <div class="column">
        <div class="card">

            <p class="title is-4">Ajouter une liste</p>
            <div class="card-content">
                <div class="field">
                    <?= $this->Form->create($n, ['enctype' => 'multipart/form-data']) ?>

                    <?= $this->Form->Control('picture', ['class' => "file-input", 'label' => 'Choisir un fichier', 'type' => 'file']) ?>


                    <?= $this->Form->Control('title', ['class' => "input"]) ?>
                    <?= $this->Form->control('visibility', ['class' => "checkbox", 'type' => 'checkbox']) ?>
                    <?= $this->Form->button('Ajouter', ['class' => "button is-primary"]) ?>


                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
