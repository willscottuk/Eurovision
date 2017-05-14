<?php
/**
  * @var \App\View\AppView $this
  */
?>
<main>
<div class="container">
    <h3><?= h($vote->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $vote->has('user') ? $this->Html->link($vote->user->id, ['controller' => 'Users', 'action' => 'view', $vote->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $vote->has('country') ? $this->Html->link($vote->country->id, ['controller' => 'Countries', 'action' => 'view', $vote->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vote->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Overall Score') ?></th>
            <td><?= $this->Number->format($vote->overall_score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Song Score') ?></th>
            <td><?= $this->Number->format($vote->song_score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Singer Score') ?></th>
            <td><?= $this->Number->format($vote->singer_score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Staging Score') ?></th>
            <td><?= $this->Number->format($vote->staging_score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($vote->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($vote->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($vote->comments)); ?>
    </div>
</div>
</main>