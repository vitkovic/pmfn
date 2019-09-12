<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manager $manager
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $manager->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $manager->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Managers'), ['action' => 'index']) ?></li>
        <hr/>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <hr/>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="managers form large-9 medium-8 columns content">
    <?= $this->Form->create($manager) ?>
    <fieldset>
        <legend><?= __('Edit Manager') ?></legend>
        <?php
        	echo $this->Form->input('id', array('type' => 'text'));
            echo $this->Form->control('First_Name');
            echo $this->Form->control('Last_Name');
            echo $this->Form->control('created_at');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
