<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Business[]|\Cake\Collection\CollectionInterface $businesses
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
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
<div class="businesses index large-10 medium-8 columns content">
    <h3><?= __('Businesses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
          <tr><td colspan="10">
<?php echo $this->Form->create(null, [
'url' => ['controller' => 'Businesses', 'action' => 'search']
]);?><?= $this->Form->control('pretrazi',['label'=>'Search All'])?>
<?= $this->Form->control('manager',['label'=>'Vendor'])?>
<?= $this->Form->control('vendor',['label'=>'Manager'])?>
<?= $this->Form->control('created_at',array('type' => 'date'),['label'=>'Created At'])?>
<?= $this->Form->button('Search',['class'=>'btn-danger','type'=>'submit','data-toogle'=>'button']); ?>
<?= $this->Form->end() ?></td>

                </td>
          </tr>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('business_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_modified_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_modified_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manager_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vendor_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($businesses as $business): ?>
            <tr>
                <td><?= h($business->id) ?></td>
                <td><?= h($business->business_name) ?></td>
                <td><?= h($business->Description) ?></td>
                <td><?= h($business->created_at) ?></td>
                <td><?= $this->Number->format($business->created_by) ?></td>
                <td><?= h($business->last_modified_at) ?></td>
                <td><?= $this->Number->format($business->last_modified_by) ?></td>
                <td><?= $business->has('manager') ? $this->Html->link($business->manager->id, ['controller' => 'Managers', 'action' => 'view', $business->manager->id]) : '' ?></td>
                <td><?= $business->has('vendor') ? $this->Html->link($business->vendor->id, ['controller' => 'Vendors', 'action' => 'view', $business->vendor->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $business->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $business->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $business->id], ['confirm' => __('Are you sure you want to delete # {0}?', $business->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
