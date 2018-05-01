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
 */

$session = $this->request->getSession()->read();

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><?php echo $this->Html->link(
                        'My Logo',
                        '/'
                    ); ?>
                </h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><?php echo $this->Html->link(
                        'Articles',
                        'articles'
                    ); ?>
                </li>
                <?php

                    if(!empty($session['Auth']['User']['id'])):
                        echo $this->Html->tag('li',
                            $this->Html->link(
                                'Users',
                                [
                                    'plugin'=>'CakeDC/Users',
                                    'controller'=>'Users',
                                    'action'=>'index'
                                ]
                            )
                        );
                        echo $this->Html->tag('li',
                            $this->Html->link(
                                'Logout',
                                'logout'
                            )
                        );
                    else:
                        echo $this->Html->tag('li',
                            $this->Html->link(
                                'Login',
                                'login'
                            )
                        );
                    endif;

                ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
