<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turnover[]|\Cake\Collection\CollectionInterface $turnovers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Turnover'), ['action' => 'add']) ?></li>
        <hr>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?></li>
        <hr>
        <li><?= $this->Html->link(__('List Deductions'), ['controller' => 'Deductions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deduction'), ['controller' => 'Deductions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="turnovers index large-9 medium-8 columns content">
    <h3><?= __('Turnovers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Deduction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('business_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($turnovers as $turnover): ?>
            <tr>
                <td><?= $this->Number->format($turnover->id) ?></td>
                <td><?= $this->Number->format($turnover->Type) ?></td>
                <td><?= $this->Number->format($turnover->Amount,['places' => 2]) ?></td>
                <td><?= $this->Number->format($turnover->Deduction,['places' => 2]) ?></td>
                <td><?= h($turnover->Description) ?></td>
                <td><?= h($turnover->created_at) ?></td>
                <td><?= $turnover->has('business') ? $this->Html->link($turnover->business->id, ['controller' => 'Businesses', 'action' => 'view', $turnover->business->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $turnover->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $turnover->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $turnover->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turnover->id)]) ?>
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
