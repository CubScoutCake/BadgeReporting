<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Districts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Scout Groups'), ['controller' => 'ScoutGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scout Group'), ['controller' => 'ScoutGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="districts form large-9 medium-8 columns content">
    <?= $this->Form->create($district) ?>
    <fieldset>
        <legend><?= __('Add District') ?></legend>
        <?php
            echo $this->Form->control('district');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
