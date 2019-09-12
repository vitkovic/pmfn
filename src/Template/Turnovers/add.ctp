<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turnover $turnover
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Turnovers'), ['action' => 'index']) ?></li>
        <hr>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?></li>
        <hr>
        <li><?= $this->Html->link(__('List Deductions'), ['controller' => 'Deductions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deduction'), ['controller' => 'Deductions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="turnovers form large-9 medium-8 columns content">
    <?= $this->Form->create($turnover) ?>
    <fieldset>
        <legend><?= __('Add Turnover') ?></legend>
        <?php
            echo $this->Form->control('Type');
            echo $this->Form->control('Amount');
            echo $this->Form->control('Deduction');
            echo $this->Form->control('Description');
            echo $this->Form->control('created_at');
            echo $this->Form->control('business_id', ['options' => $businesses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
