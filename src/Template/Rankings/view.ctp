<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ranking'), ['action' => 'edit', $ranking->country_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ranking'), ['action' => 'delete', $ranking->country_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ranking->country_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rankings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ranking'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ranks'), ['controller' => 'Ranks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rank'), ['controller' => 'Ranks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rankings view large-9 medium-8 columns content">
    <h3><?= h($ranking->country_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $ranking->has('country') ? $this->Html->link($ranking->country->id, ['controller' => 'Countries', 'action' => 'view', $ranking->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rank') ?></th>
            <td><?= $ranking->has('rank') ? $this->Html->link($ranking->rank->id, ['controller' => 'Ranks', 'action' => 'view', $ranking->rank->id]) : '' ?></td>
        </tr>
    </table>
</div>
