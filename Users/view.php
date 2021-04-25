<p class="title is-4 has-text-centered">Ma todoList</p>

<div class="columns container ">
    <div class="column is-one-fifth"></div>
    <article class="todolist">
        <div class="card">
            <?php foreach ($user->todolists as $t)  : ?>
            <div class="card-image block">
                <?php if ($t->picture != null) : ?>
                    <?= $this->Html->image('data/pictures/' . $t->picture, ['alt' => $t->title]) ?>
                <?php endif; ?>
                <?php if ($t->picture == null) : ?>
                    <img
                        src="https://images-ext-1.discordapp.net/external/tvwG0a8im3V7mGl9HzPJmKQQfmEsCFI32W6cJwLR3Zo/https/bulma.io/images/placeholders/128x128.png"
                        class="rounded mx-auto d-block">
                <?php endif; ?>
            </div>
        <div class="column">
            <div class="card-content has-text-centered">
                <div class="media-content">
                    <div class="block">
                        <h3 class="card-text"><?= $t->title ?></h3>
                    </div>
                    <?= $this->Form->postLink('Supprimer la liste', ['controller' => 'Todolists', 'action' => 'delete', $t->id], ['class' => 'button is-danger is-outlined']) ?>
                    <?= $this->Html->link('Modifier la liste', ['controller' => 'Todolists', 'action' => 'edit', $t->id], ['class' => 'button is-warning is-outlined']) ?>
                </div>
            </div>
            <?php foreach ($t->items as $item)  : ?>
            <div class="column has-text-centered">

                <p class="title is-5">l'élément : </p>
                <p class="card-text">Deadline : <?= $item->deadline ?>   </p>
                <?php if($item->status ==1):?>
                    <p> Statut : <?= $item->status ?>   </p>

                    <div class="form-check">
                        <input class="checkbox" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <p><?php $item->content ?></p>
                        </label>
                    </div>
                <?php endif; ?>
                <?php if($item->status == 0):?>
                    <div class="form-check">
                        <input class="checkbox" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <p><?php $item->content ?></p>
                            <p>l'élément : <?= $item->content ?>   </p>
                        </label>
                    </div>
                <?php endif; ?>
                <span class="tag is-warning is-light"> <?= $this->Form->postLink('Modifier l\'élément', ['controller' => 'Items', 'action' => 'edit', $item->id]) ?></span>

                <span class="tag is-danger is-light"> <?= $this->Form->postLink('Suprimer l\'élément', ['controller' => 'Items', 'action' => 'delete', $item->id]) ?></span>
                <?php endforeach; ?>

            </div>
            <footer>
                <div class="block">
                <?= $this->Form->create($newItem, ['url' => ['controller' => 'Items', 'action' => 'new']]) ?>
                <?= $this->Form->hidden('todolist_id', ['value' => $t->id]) ?>

                <?= $this->Form->control('content', ['class' => "input", 'label' => 'Ajouter un commentaire']) ?>

                     <?= $this->Form->control('deadline', ['label' => 'deadline']) ?>



                <?= $this->Form->control('status', ['type' => 'checkbox']) ?>

                <?= $this->Form->button('Ajouter', ['class' => 'block button is-primary is-outlined']) ?>
                <?= $this->Form->end() ?>
                <?php endforeach; ?>
                </div>
            </footer>
        </div>
        </div>
    </article>







