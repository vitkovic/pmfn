<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Card'), ['action' => 'edit', $card->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Card'), ['action' => 'delete', $card->id], ['confirm' => __('Are you sure you want to delete # {0}?', $card->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Card'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Deductions'), ['controller' => 'Deductions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deduction'), ['controller' => 'Deductions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cards view large-9 medium-8 columns content">
    <h3><?= h($card->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($card->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($card->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($card->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Deductions') ?></h4>
        <?php if (!empty($card->deductions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Card Id') ?></th>
                <th scope="col"><?= __('Turnover Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($card->deductions as $deductions): ?>
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
