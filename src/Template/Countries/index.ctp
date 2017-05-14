<?php
/**
  * @var \App\View\AppView $this
  */
?>
<main>
	<div class="container">
		<div class="col-12">
			<h1>Eurovision 2017 in the Cronx</h1>
			<p>Vote along below!</p>
			<table class="table table-striped">
			  <thead>
			    <tr>
				    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('flag') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('song') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('artist') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
	                <th scope="col" class="actions"><?= __('Actions') ?></th>
			      <th>
			    </tr>
			  </thead>
			  <tbody>
            <?php foreach ($countries as $country): ?>
            <tr>
                <td><?= $this->Number->format($country->id) ?></td>
                <td><?= h($country->name) ?></td>
                <td><img src="/img/flags-iso/flat/32/<?PHP echo $country['flag']; ?>.png" alt="<?PHP echo $country['name']; ?>"/> </td>
                <td><?= h($country->song) ?></td>
                <td><?= h($country->artist) ?></td>
                <td><?= h($country->created) ?></td>
                <td><?= h($country->modified) ?></td>
                <td><?= $this->Number->format($country->position) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $country->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $country->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id)]) ?>
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
