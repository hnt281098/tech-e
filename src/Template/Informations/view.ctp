<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Information $information
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Information'), ['action' => 'edit', $information->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Information'), ['action' => 'delete', $information->id], ['confirm' => __('Are you sure you want to delete # {0}?', $information->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Informations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Information'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="informations view large-9 medium-8 columns content">
    <h3><?= h($information->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($information->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount News') ?></th>
            <td><?= $this->Number->format($information->amount_news) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Users') ?></th>
            <td><?= $this->Number->format($information->amount_users) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Views') ?></th>
            <td><?= $this->Number->format($information->amount_views) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Comments') ?></th>
            <td><?= $this->Number->format($information->amount_comments) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Introduce') ?></h4>
        <?= $this->Text->autoParagraph(h($information->introduce)); ?>
    </div>
</div>
