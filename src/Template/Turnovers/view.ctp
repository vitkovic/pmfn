<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turnover $turnover
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Turnover'), ['action' => 'edit', $turnover->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Turnover'), ['action' => 'delete', $turnover->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turnover->id)]) ?> </li>
        <hr>
        <li><?= $this->Html->link(__('List Turnovers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Turnover'), ['action' => 'add']) ?> </li>
        <hr>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?> </li>
        <hr>
        <li><?= $this->Html->link(__('List Deductions'), ['controller' => 'Deductions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deduction'), ['controller' => 'Deductions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="turnovers view large-9 medium-8 columns content">
    <h3><?= h($turnover->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($turnover->Description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Business') ?></th>
            <td><?= $turnover->has('business') ? $this->Html->link($turnover->business->id, ['controller' => 'Businesses', 'action' => 'view', $turnover->business->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($turnover->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($turnover->Type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($turnover->Amount,['places' => 2]) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deduction') ?></th>
            <td><?= $this->Number->format($turnover->Deduction,['places' => 2]) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($turnover->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Deductions') ?></h4>
        <?php if (!empty($turnover->deductions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Card Id') ?></th>
                <th scope="col"><?= __('Turnover Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($turnover->deductions as $deductions): ?>
            <tr>
                <td><?= h($deductions->id) ?></td>
                <td><?= h($deductions->amount) ?></td>
                <td><?= h($deductions->card_id) ?></td>
                <td><?= h($deductions->turnover_id) ?></td>
                <td><?= h($deductions->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Deductions', 'action' => 'view', $deductions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Deductions', 'action' => 'edit', $deductions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Deductions', 'action' => 'delete', $deductions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deductions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
