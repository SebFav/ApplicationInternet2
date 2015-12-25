<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Email Confimer'); ?>
        </legend>

<?php echo $this->Form->end(__('Login')); ?>
</div>

