<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vendor $vendor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vendor'), ['action' => 'edit', $vendor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vendor'), ['action' => 'delete', $vendor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['action' => 'add']) ?> </li>
        <hr/>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <hr/>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vendors view large-9 medium-8 columns content">
    <h3><?= h($vendor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($vendor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vendor Name') ?></th>
            <td><?= h($vendor->vendor_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $vendor->has('user') ? $this->Html->link($vendor->user->id, ['controller' => 'Users', 'action' => 'view', $vendor->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($vendor->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Businesses') ?></h4>
        <?php if (!empty($vendor->businesses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Business Name') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Last Modified At') ?></th>
                <th scope="col"><?= __('Last Modified By') ?></th>
                <th scope="col"><?= __('Manager Id') ?></th>
                <th scope="col"><?= __('Vendor Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vendor->businesses as $businesses): ?>
            <tr>
                <td><?= h($businesses->id) ?></td>
                <td><?= h($businesses->business_name) ?></td>
                <td><?= h($businesses->created_at) ?></td>
                <td><?= h($businesses->created_by) ?></td>
                <td><?= h($businesses->last_modified_at) ?></td>
                <td><?= h($businesses->last_modified_by) ?></td>
                <td><?= h($businesses->manager_id) ?></td>
                <td><?= h($businesses->vendor_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Businesses', 'action' => 'view', $businesses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Businesses', 'action' => 'edit', $businesses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Businesses', 'action' => 'delete', $businesses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businesses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
