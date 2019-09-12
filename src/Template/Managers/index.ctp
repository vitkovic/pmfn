<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manager[]|\Cake\Collection\CollectionInterface $managers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Manager'), ['action' => 'add']) ?></li>
        <hr/>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <hr/>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?></li>
        <hr/>
    </ul>
</nav>
<div class="managers index large-9 medium-8 columns content">
    <h3><?= __('Managers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('First_Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Last_Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($managers as $manager): ?>
            <tr>
                <td><?= h($manager->id) ?></td>
                <td><?= h($manager->First_Name) ?></td>
                <td><?= h($manager->Last_Name) ?></td>
                <td><?= h($manager->created_at) ?></td>
                <td><?= $manager->has('user') ? $this->Html->link($manager->user->id, ['controller' => 'Users', 'action' => 'view', $manager->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $manager->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $manager->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $manager->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manager->id)]) ?>
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
