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
            <h3><i class="fa fa-lock"></i>  Login to Eurovision</h3>
        </div>

        <!--Body-->

<?= $this->Form->create() ?>
<?= $this->Form->control('username', ['class' => 'form-control']) ?>
<?= $this->Form->control('password', ['class' => 'form-control']) ?>
<?= $this->Form->submit('Login', ['class' => 'btn btn-outline-primary waves-effect pull-right']) ?>
<?= $this->Form->end() ?>

    </div>

    <!--Footer-->
    <div class="modal-footer">
        <div class="options">
            <p>Not yet registered? <a href="/users/register">Sign Up</a></p>

</div>
    </div>

</div>
<!--/Form with header-->
</div>
</div>
