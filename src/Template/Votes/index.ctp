<?php
/**
  * @var \App\View\AppView $this
  */
?>
<main>
<div class="container">
<div class="col-md-12">
    <h3><?= __('Votes') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('overall_score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('song_score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('singer_score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('staging_score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($votes as $vote): ?>
            <tr>
                <td><?= $this->Number->format($vote->id) ?></td>
                <td><?= $vote->has('user') ? $this->Html->link($vote->user->id, ['controller' => 'Users', 'action' => 'view', $vote->user->id]) : '' ?></td>
                <td><?= $vote->has('country') ? $this->Html->link($vote->country->id, ['controller' => 'Countries', 'action' => 'view', $vote->country->id]) : '' ?></td>
                <td><?= $this->Number->format($vote->overall_score) ?></td>
                <td><?= $this->Number->format($vote->song_score) ?></td>
                <td><?= $this->Number->format($vote->singer_score) ?></td>
                <td><?= $this->Number->format($vote->staging_score) ?></td>
                <td><?= h($vote->created) ?></td>
                <td><?= h($vote->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vote->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vote->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vote->id)]) ?>
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
</div>
</main>