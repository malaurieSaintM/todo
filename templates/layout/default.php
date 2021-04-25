<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/055076ecc5.js" crossorigin="anonymous"></script>


    <?= $this->Html->css(['bulma/bulma.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

<nav class="navbar" role="navigation" aria-label="main navigation">

        <div class="navbar-brand">
            <a class="navbar-item" href="http://tests/todolists">
                <img src="../../webroot/img/data/pictures/logo_small.png" alt="" width="200" height="50"
                     class="d-inline-block align-text-top">
            </a>
        </div>
    <div class="navbar-menu">

            <div class="navbar-end">
                <a class="navbar-item">
                    <?= $this->Html->link('Home', ['controller' => 'Todolists', 'action' => 'index'], ['class' => 'navbar-item']) ?>
                </a>
                <?php if ($this->request->getAttribute('identity') == null) : ?>
                    <a class="navbar-item">
                        <?= $this->Html->link('Inscription', ['controller' => 'Users', 'action' => 'new'], ['class' => 'navbar-item']) ?>
                    </a>
                    <a class="navbar-item">
                        <?= $this->Html->link('Connexion', ['controller' => 'Users', 'action' => 'login'], ['class' => 'navbar-item']) ?>
                    </a>
                    <a class="navbar-item">
                <?php else : ?>
                    <?= $this->Html->link('Ajouter liste', ['controller' => 'Todolists', 'action' => 'new'], ['class' => 'navbar-item']) ?>
                    </a>
                    <a class="navbar-item">
                        <?= $this->Html->link('Ma liste', ['controller' => 'Users', 'action' => 'view', $this->request->getAttribute('identity')->id], ['class' => 'navbar-item']) ?>
                    </a>
                    <a class="navbar-item">
                        <?= $this->Html->link('Déconnexion', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'navbar-item']) ?>
                    </a>
                    <a class="navbar-item">
                        <?= $this->Html->link('Mon compte', ['controller' => 'Users', 'action' => 'account', $this->request->getAttribute('identity')->id], ['class' => 'navbar-item']) ?>
                    </a>
                <?php endif; ?>
            </div>
    </div>
</nav>




<main class="main">
    <div class="container">

        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>
<footer>
</footer>
</body>

</html>
