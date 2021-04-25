<div class="columns">
    <div class="column is-half is-offset-one-quarter">
        <div class="card">
            <div class="card-image">
                <figure class="image is-16by9">
                    <?php if ($user->avatar != null) : ?>

                        <?= $this->Html->image('data/pictures/' . $user->avatar) ?>
                    <?php endif; ?>
                    <?php if ($user->avatar == null) : ?>
                        <img
                            src="https://images-ext-1.discordapp.net/external/tvwG0a8im3V7mGl9HzPJmKQQfmEsCFI32W6cJwLR3Zo/https/bulma.io/images/placeholders/128x128.png">
                    <?php endif; ?>
                </figure>
            </div>
            <div class="card-content">
                <div class="media">

                    <div class="media-content">
                        <p class="title is-4">Mon profil</p>
                        <p class="subtitle is-5">@<?= $user->username ?></p
                    </div>
                </div>
            </div>
            <footer class="card-footer">
                <a><?= $this->Form->postLink('Suprimer', ['class' => "card-footer-item", 'controller' => 'Users', 'action' => 'delete', $user->id]) ?></a>
            </footer>
            <footer class="card-footer">
                <a><?= $this->Html->link('Modifier', ['class' => "card-footer-item", 'controller' => 'Users', 'action' => 'edit', $user->id]) ?></a>
            </footer>
        </div>
    </div>







