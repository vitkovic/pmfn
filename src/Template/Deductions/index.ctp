<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deduction[]|\Cake\Collection\CollectionInterface $deductions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Deduction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Turnovers'), ['controller' => 'Turnovers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Turnover'), ['controller' => 'Turnovers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deductions index large-9 medium-8 columns content">
    <h3><?= __('Deductions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('card_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('turnover_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deductions as $deduction): ?>
            <tr>
                <td><?= $this->Number->format($deduction->id) ?></td>
                <td><?= $this->Number->format($deduction->amount) ?></td>
                <td><?= $deduction->has('card') ? $this->Html->link($deduction->card->name, ['controller' => 'Cards', 'action' => 'view', $deduction->card->id]) : '' ?></td>
                <td><?= $deduction->has('turnover') ? $this->Html->link($deduction->turnover->id, ['controller' => 'Turnovers', 'action' => 'view', $deduction->turnover->id]) : '' ?></td>
                <td><?= h($deduction->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deduction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deduction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deduction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deduction->id)]) ?>
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
