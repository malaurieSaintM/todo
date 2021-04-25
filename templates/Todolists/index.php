<p class="title is-4 has-text-centered">TodoList</p>

<div class="columns container ">
    <div class="column is-two-fifths"></div>

    <article class="todolist">
        <div class="card">
            <div class="card-image block">
                <?php foreach ($todolistIndex

                as $todolistPict): ?>
                <?php if ($todolistPict->visibility == 1) : ?>
                    <figure class="image is-2by1">
                        <?php if ($todolistPict->picture != null) : ?>
                            <?= $this->Html->image('data/pictures/' . $todolistPict->picture, ['alt' => $todolistPict->title]) ?>
                        <?php endif; ?>
                        <?php if ($todolistPict->picture == null) : ?>
                            <img
                                src="https://images-ext-1.discordapp.net/external/tvwG0a8im3V7mGl9HzPJmKQQfmEsCFI32W6cJwLR3Zo/https/bulma.io/images/placeholders/128x128.png">
                        <?php endif; ?>
                    </figure>
                <?php endif; ?>
            </div>

            <div class="column">
                <div class="card-content has-text-centered">
                    <div class="media-content">
                        <p><span>Auteur :</span> <?= $todolistPict->user->username ?></p>
                        <p><span>Creer le :</span> <?= $todolistPict->created ?></p>
                        <p><span>Modifier le :</span> <?= $todolistPict->modified ?></p>

                        <?= $this->Form->postLink($todolistPict->user->username, ['controller' => 'Users', 'action' => 'index', $todolistPict->user->id]) ?>
                    </div>
                </div>

                <footer>
                    <div class="block">
                        <?= $this->Form->postLink('Copier', ['controller' => 'Todolists', 'action' => 'copy', $todolistPict->id,]) ?>
                        <h4>elements (<?= count($todolistPict->items) ?> ) </h4>
                        <?php foreach ($todolistPict->items as $c): ?>
                            <p> Deadline : <?= $c->deadline ?>   </p>
                            <p> Statut : <?= $c->status ?>   </p>
                            <p>le commentaire : <?= $c->content ?>   </p>

                        <?php endforeach ?>

                        <?php endforeach ?>
                    </div>
                </footer>

            </div>
    </article>
</div>































