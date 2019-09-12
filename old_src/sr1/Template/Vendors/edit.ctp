<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vendor $vendor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vendor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vendor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vendors'), ['action' => 'index']) ?></li>
        <hr/>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <hr/>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vendors form large-9 medium-8 columns content">
    <?= $this->Form->create($vendor) ?>
    <fieldset>
        <legend><?= __('Edit Vendor') ?></legend>
        <?php
        	echo $this->Form->input('id', array('type' => 'text'));
            echo $this->Form->control('vendor_name');
            echo $this->Form->control('created_at');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
