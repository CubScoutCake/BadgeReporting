<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\District $district
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit District'), ['action' => 'edit', $district->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete District'), ['action' => 'delete', $district->id], ['confirm' => __('Are you sure you want to delete # {0}?', $district->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Districts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New District'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scout Groups'), ['controller' => 'ScoutGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scout Group'), ['controller' => 'ScoutGroups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="districts view large-9 medium-8 columns content">
    <h3><?= h($district->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('District') ?></th>
            <td><?= h($district->district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($district->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($district->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($district->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Scout Groups') ?></h4>
        <?php if (!empty($district->scout_groups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Scout Group') ?></th>
                <th scope="col"><?= __('District Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($district->scout_groups as $scoutGroups): ?>
            <tr>
                <td><?= h($scoutGroups->id) ?></td>
                <td><?= h($scoutGroups->scout_group) ?></td>
                <td><?= h($scoutGroups->district_id) ?></td>
                <td><?= h($scoutGroups->created) ?></td>
                <td><?= h($scoutGroups->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ScoutGroups', 'action' => 'view', $scoutGroups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ScoutGroups', 'action' => 'edit', $scoutGroups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ScoutGroups', 'action' => 'delete', $scoutGroups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scoutGroups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
