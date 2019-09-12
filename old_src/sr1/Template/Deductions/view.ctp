<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deduction $deduction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Deduction'), ['action' => 'edit', $deduction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Deduction'), ['action' => 'delete', $deduction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deduction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Deductions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deduction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Turnovers'), ['controller' => 'Turnovers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Turnover'), ['controller' => 'Turnovers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deductions view large-9 medium-8 columns content">
    <h3><?= h($deduction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Card') ?></th>
            <td><?= $deduction->has('card') ? $this->Html->link($deduction->card->name, ['controller' => 'Cards', 'action' => 'view', $deduction->card->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Turnover') ?></th>
            <td><?= $deduction->has('turnover') ? $this->Html->link($deduction->turnover->id, ['controller' => 'Turnovers', 'action' => 'view', $deduction->turnover->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($deduction->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deduction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($deduction->amount) ?></td>
        </tr>
    </table>
</div>
