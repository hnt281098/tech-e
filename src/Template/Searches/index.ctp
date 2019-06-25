<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Search[]|\Cake\Collection\CollectionInterface $searches
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Search'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="searches index large-9 medium-8 columns content">
    <h3><?= __('Searches') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('keyword') ?></th>
                <th scope="col"><?= $this->Paginator->sort('times') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($searches as $search): ?>
            <tr>
                <td><?= $this->Number->format($search->id) ?></td>
                <td><?= h($search->keyword) ?></td>
                <td><?= $this->Number->format($search->times) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $search->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $search->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $search->id], ['confirm' => __('Are you sure you want to delete # {0}?', $search->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
