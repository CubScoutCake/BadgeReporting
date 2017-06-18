<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $authRole->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $authRole->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Auth Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="authRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($authRole) ?>
    <fieldset>
        <legend><?= __('Edit Auth Role') ?></legend>
        <?php
            echo $this->Form->control('auth_role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
