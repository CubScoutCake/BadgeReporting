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
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auth Roles'), ['controller' => 'AuthRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auth Role'), ['controller' => 'AuthRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('last_login');
            echo $this->Form->control('login_count');
            echo $this->Form->control('role_id', ['options' => $roles]);
            echo $this->Form->control('auth_role_id', ['options' => $authRoles]);
            echo $this->Form->control('section_id', ['options' => $sections]);
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('phone');
            echo $this->Form->control('address_1');
            echo $this->Form->control('address_2');
            echo $this->Form->control('city');
            echo $this->Form->control('county');
            echo $this->Form->control('postcode');
            echo $this->Form->control('osm_user_id');
            echo $this->Form->control('osm_secret');
            echo $this->Form->control('osm_linked');
            echo $this->Form->control('osm_linkdate');
            echo $this->Form->control('osm_current_term');
            echo $this->Form->control('osm_term_end');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
