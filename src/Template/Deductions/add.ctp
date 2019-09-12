<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deduction $deduction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Deductions'), ['action' => 'index']) ?></li>
        <hr>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
        <hr>
        <li><?= $this->Html->link(__('List Turnovers'), ['controller' => 'Turnovers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Turnover'), ['controller' => 'Turnovers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deductions form large-9 medium-8 columns content">
    <?= $this->Form->create($deduction) ?>
    <fieldset>
        <legend><?= __('Add Deduction') ?></legend>
        <?php
          //  echo $this->Form->control('amount');
            echo $this->Form->control('percentage');
            echo $this->Form->control('card_id', ['options' => $cards]);
            echo $this->Form->control('turnover_id', ['options' => $turnovers]);
            echo $this->Form->control('description');
           $sizes = ['1' => 'Static', '-1' => 'Dynamic'];
		   echo $this->Form->select('state', $sizes, ['default' => '1']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
