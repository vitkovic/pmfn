<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Business $business
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Business'), ['action' => 'edit', $business->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Business'), ['action' => 'delete', $business->id], ['confirm' => __('Are you sure you want to delete # {0}?', $business->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Businesses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business'), ['action' => 'add']) ?> </li>
        <hr/>
        <li><?= $this->Html->link(__('List Managers'), ['controller' => 'Managers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager'), ['controller' => 'Managers', 'action' => 'add']) ?> </li>
        <hr/>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="businesses view large-9 medium-8 columns content">
    <h3><?= h($business->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($business->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Business Name') ?></th>
            <td><?= h($business->business_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($business->Description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manager') ?></th>
            <td><?= $business->has('manager') ? $this->Html->link($business->manager->id, ['controller' => 'Managers', 'action' => 'view', $business->manager->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vendor') ?></th>
            <td><?= $business->has('vendor') ? $this->Html->link($business->vendor->id, ['controller' => 'Vendors', 'action' => 'view', $business->vendor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($business->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Modified By') ?></th>
            <td><?= $this->Number->format($business->last_modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($business->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Modified At') ?></th>
            <td><?= h($business->last_modified_at) ?></td>
        </tr>
    </table>
</div>
