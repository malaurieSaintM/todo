<p class="title is-4 has-text-centered">Ma TodoList</p>

<div class="columns container ">
    <div class="column is-two-fifths"></div>

    <article class="todolist">
        <div class="card">
            <div class="card-image block">
                <?php foreach ($user->todolists as $t)  : ?>
                <?php if ($t->visibility == 1) : ?>
                    <figure class="image is-2by1">
                        <?php if ($t->picture != null) : ?>
                            <?= $this->Html->image('data/pictures/' . $t->picture, ['alt' => $t->title]) ?>
                        <?php endif; ?>

                        <?php if ($t->picture == null) : ?>
                            <img
                                src="https://images-ext-1.discordapp.net/external/tvwG0a8im3V7mGl9HzPJmKQQfmEsCFI32W6cJwLR3Zo/https/bulma.io/images/placeholders/128x128.png">
                        <?php endif; ?>
                    </figure>

                <?php endif; ?>
            </div>


            <div class="column">
                <div class="card-content has-text-centered">
                    <div class="media-content">
                        <h3 class="card-text"><?= $t->title ?></h3>
                    </div>
                </div>

                <footer>
                    <div class="block">
                        <?php foreach ($t->items as $items)  : ?>

                            <h5>l'element : </h5>
                            <p class="card-text">Deadline : <?= $items->deadline ?>   </p>
                            <p> Statut : <?= $items->status ?>   </p>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <p>l'element' : <?= $items->content ?>   </p>
                            </label>
                        <?php endforeach; ?>
                        <?php endforeach; ?>

                    </div>
                </footer>
            </div>

        </div>
    </article>
</div>




