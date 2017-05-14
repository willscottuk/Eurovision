<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="view hm-black-strong">
	<div class="full-bg-img flex-center">
	<!--Form with header-->
		<div class="card" style="min-width: 30%;">
		    <div class="card-block">
		
		        <!--Header-->
		        <div class="form-header primary-color">
		            <h3>Create an Account</h3>
		        </div>
		
		        <!--Body-->
		    <?= $this->Form->create($user) ?>
			<?= $this->Form->control('username', ['class' => 'form-control']) ?>
			<?= $this->Form->control('password', ['class' => 'form-control']) ?>
			<?= $this->Form->submit('Register', ['class' => 'btn btn-outline-primary waves-effect pull-right']) ?>
			<?= $this->Form->end() ?>
		    </div>
		</div>
	</div>
</div>
