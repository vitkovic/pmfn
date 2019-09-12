<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Business[]|\Cake\Collection\CollectionInterface $businesses
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Links') ?></li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses','action' => 'add']) ?></li>
          <li><?= $this->Html->link(__('List Business'), ['controller' => 'Businesses','action' => 'index']) ?></li>
        <hr/>
        <li><?= $this->Html->link(__('List Managers'), ['controller' => 'Managers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager'), ['controller' => 'Managers', 'action' => 'add']) ?></li>
        <hr/>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="index large-10 medium-8 columns content">
<img style="-webkit-user-select: none;cursor: zoom-in;" src="http://www.artfulthinkers.com/wp-content/uploads/2017/06/iStock_91504847_MEDIUM.jpg" width="1083" height="721" title="http://www.artfulthinkers.com/wp-content/uploads/2017/06/iStock_91504847_MEDIUM.jpg">
</div>
