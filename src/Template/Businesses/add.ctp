<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Business $business
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav">
      <li class="heading"><?= __('Actions') ?></li>
      <li><?= $this->Html->link(__('New Business'), ['action' => 'add']) ?></li>
      <hr/>
      <li><?= $this->Html->link(__('List Managers'), ['controller' => 'Managers', 'action' => 'index']) ?></li>
      <li><?= $this->Html->link(__('New Manager'), ['controller' => 'Managers', 'action' => 'add']) ?></li>
      <hr/>
      <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?></li>
      <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?></li>
  </ul>
</nav>
<div class="businesses form large-9 medium-8 columns content">
    <?= $this->Form->create($business) ?>
    <fieldset>
        <legend><?= __('Add Business') ?></legend>
        <?php
        	  echo $this->Form->input('id', array('type' => 'text'));
            echo $this->Form->control('business_name');
            echo $this->Form->control('Description');
            echo $this->Form->control('created_at');
            echo $this->Form->control('created_by');
            echo $this->Form->control('last_modified_at');
            echo $this->Form->control('last_modified_by');
            echo $this->Form->control('manager_id', ['options' => $managers]);
            echo $this->Form->control('vendor_id', ['options' => $vendors]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
